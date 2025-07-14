const apiKey = document.currentScript.dataset.mapsKey;
const nativeAttachShadow = Element.prototype.attachShadow;

Element.prototype.attachShadow = function(init) {
    if(this.localName === 'gmp-place-autocomplete') {
        const root = nativeAttachShadow.call(this, { ...init, mode: 'open' });

        const style = document.createElement('style');
        style.textContent = `
            .widget-container {
                border: 0 !important;
                background: transparent !important;
                box-shadow: none !important;
            }
            .focus-ring {
                border: 0 !important;
            }
            :host {
                border: 0 !important;
                color-scheme: none!important;
            }
        `;
        root.append(style);
        return root;
    }

    return nativeAttachShadow.call(this, init);
};

(g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})({
    key: apiKey,
    v: "weekly"
});

async function initMap() {
    await google.maps.importLibrary("places");
    const { Geocoder } = await google.maps.importLibrary("geocoding");

    const placeAutocomplete = new google.maps.places.PlaceAutocompleteElement();
    document.getElementById('place-autocomplete-card').appendChild(placeAutocomplete);

    const pickComponent = (components, types) =>
        (components || []).find(c => c.types.some(t => types.includes(t))) || null;

    placeAutocomplete.addEventListener('gmp-select', async ({ placePrediction }) => {
        const place = placePrediction.toPlace();
        await place.fetchFields({
            fields: ['displayName', 'formattedAddress', 'addressComponents', 'location']
    });

    document.getElementById('address_name').value = place.displayName || '';
    document.getElementById('address_en').value = place.formattedAddress || '';

    const cityEN = pickComponent(
        place.addressComponents,
        [
            'locality',
            'postal_town',
            'administrative_area_level_2', 'administrative_area_level_1',
            'sublocality_level_1'
        ]
    );

    document.getElementById('city_en').value = cityEN?.longText || cityEN?.long_name || '';

    document.getElementById('latitude' ).value = place.location.lat().toFixed(7);
    document.getElementById('longitude').value = place.location.lng().toFixed(7);


    const geocoder = new google.maps.Geocoder();

    geocoder.geocode(
        {
            location: place.location,
            language: 'ar'
        },
        (results, status) => {
            if(status === 'OK' && results?.length) {
                const first = results[0];

                document.getElementById('address_ar').value = first.formatted_address || '';

                const cityAR = (first.address_components || []).find(comp =>
                    comp.types.some(type =>
                        [
                            'locality', 'postal_town', 'administrative_area_level_2', 'administrative_area_level_1', 'sublocality_level_1'
                        ].includes(type)
                    )
                );

                document.getElementById('city_ar').value = cityAR?.long_name || '';
            }
            else {
                console.error('Geocoder failed:', status);
            }
        }
        );
    });
}

initMap();