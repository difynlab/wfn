@extends('backend.layouts.app')
@section('title','Review and approve quote')

@push('after-styles')
<link href="{{ asset('backend/css/tenant-warehouses.css') }}" rel="stylesheet">
<link href="{{ asset('backend/css/approve-quote.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="page-wrap">
    {{-- Header --}}
    <div class="tw-header mb-3">
        <div>
            <h1 class="tw-title">Review and approve quote</h1>
            <div class="tw-desc">Customize your selected quota depending on your needs.</div>
        </div>
    </div>

    {{-- Main Content --}}
    <div class="approve-quote-page">
        {{-- Quote Customization Inputs --}}
        <div class="quote-inputs card-like">
            <div class="input-container">
                <label>No. Pallets</label>
                <div class="number-controls">
                    <button type="button" class="btn-minus" aria-label="decrease pallets" onclick="decrementPallets()">−</button>
                    <input type="number" id="pallets" class="number-input" value="0" min="0" inputmode="numeric">
                    <button type="button" class="btn-plus" aria-label="increase pallets" onclick="incrementPallets()">+</button>
                </div>
            </div>

            <div class="vertical-separator" role="separator" aria-hidden="true"></div>

            <div class="input-container">
                <label>SqM</label>
                <div class="number-controls">
                    <button type="button" class="btn-minus" aria-label="decrease sqm" onclick="decrementSqm()">−</button>
                    <input type="number" id="sqm" class="number-input" value="0" min="0" inputmode="numeric">
                    <button type="button" class="btn-plus" aria-label="increase sqm" onclick="incrementSqm()">+</button>
                </div>
            </div>
        </div>

        {{-- Storage --}}
        <div class="service-section card-like">
            <button class="section-title" type="button">
                <h3>Storage</h3>
                <i class="bi bi-chevron-down dropdown-icon" aria-hidden="true"></i>
            </button>

            <div class="service-content">
                <div class="service-header has-qty">
                    <span class="th th-service">SERVICE</span>
                    <span class="th th-qty">QUANTITY</span>
                    <span class="th th-rate">RATE</span>
                </div>

                <div class="service-row has-qty">
                    <div class="td td-service">
                        Ambient Pallet | Feed Items | 18°–27°C
                    </div>
                    <div class="td td-qty">0</div>
                    <div class="td td-rate">80 SAR / PALLET</div>
                </div>

                <div class="service-row has-qty">
                    <div class="td td-service">
                        Ambient Food Pallet <i class="bi bi-info-circle"></i>
                    </div>
                    <div class="td td-qty">0</div>
                    <div class="td td-rate">80 SAR / PALLET</div>
                </div>

                <div class="service-row has-qty">
                    <div class="td td-service">
                        Ambient Pallet | Cosmotology Goods | 18°–27°C
                    </div>
                    <div class="td td-qty">0</div>
                    <div class="td td-rate">80 SAR / PALLET</div>
                </div>
            </div>
        </div>

        {{-- Movement Services --}}
        <div class="service-section card-like">
            <button class="section-title" type="button">
                <h3>Movement Services</h3>
                <i class="bi bi-chevron-down dropdown-icon" aria-hidden="true"></i>
            </button>

            <div class="service-content">
                <div class="service-header">
                    <span class="th th-service">SERVICE</span>
                    <span class="th th-rate">RATE</span>
                </div>

                <div class="service-row">
                    <div class="td td-service">Lorem ipsum consectetur ipsum dolor sit</div>
                    <div class="td td-rate"><strong>80 SAR / PALLET</strong></div>
                </div>

                <div class="service-row">
                    <div class="td td-service">Ambient Food Pallet <i class="bi bi-info-circle"></i></div>
                    <div class="td td-rate"><strong>80 SAR / PALLET</strong></div>
                </div>

                <div class="service-row">
                    <div class="td td-service">Lorem ipsum consectetur ipsum dolor sit</div>
                    <div class="td td-rate"><strong>80 SAR / PALLET</strong></div>
                </div>
            </div>
        </div>

        {{-- Pallet Services --}}
        <div class="service-section card-like">
            <button class="section-title" type="button">
                <h3>Pallet Services</h3>
                <i class="bi bi-chevron-down dropdown-icon" aria-hidden="true"></i>
            </button>

            <div class="service-content">
                <div class="service-header">
                    <span class="th th-service">SERVICE</span>
                    <span class="th th-rate">RATE</span>
                </div>

                <div class="service-row">
                    <div class="td td-service">Lorem ipsum consect <i class="bi bi-info-circle"></i></div>
                    <div class="td td-rate"><strong>80 SAR / PALLET</strong></div>
                </div>

                <div class="service-row">
                    <div class="td td-service">Lorem ipsum consect dolor</div>
                    <div class="td td-rate"><strong>80 SAR / PALLET</strong></div>
                </div>
            </div>
        </div>

        {{-- Action Buttons --}}
        <div class="action-buttons">
            <button type="button" class="btn-cancel">Cancel</button>
            <button type="button" class="btn-approve">Approve Quote</button>
            <button type="button" class="btn-save">Save Changes</button>
        </div>
    </div>
</div>
@endsection

@push('after-scripts')
<script>
    // number steppers
    function incrementPallets(){ const el=document.getElementById('pallets'); el.value = (+el.value||0)+1; }
    function decrementPallets(){ const el=document.getElementById('pallets'); el.value = Math.max(0,(+el.value||0)-1); }
    function incrementSqm(){ const el=document.getElementById('sqm'); el.value = (+el.value||0)+1; }
    function decrementSqm(){ const el=document.getElementById('sqm'); el.value = Math.max(0,(+el.value||0)-1); }

    // accordion toggle (fixed selector)
    document.querySelectorAll('.service-section .section-title').forEach((btn)=>{
        btn.addEventListener('click', ()=>{
            const content = btn.parentElement.querySelector('.service-content');
            const icon = btn.querySelector('.dropdown-icon');
            const expanded = content.style.display !== 'none';
            content.style.display = expanded ? 'none' : 'block';
            icon.style.transform = expanded ? 'rotate(0deg)' : 'rotate(180deg)';
        });
    });

    // default: sections open, but keep display style explicit for consistency
    document.querySelectorAll('.service-content').forEach(c => c.style.display='block');
</script>
@endpush
