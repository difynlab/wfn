(function() {
  // Tab functionality
  const btnW = document.getElementById('twTabWarehouses');
  const btnQ = document.getElementById('twTabQuotations');
  const cW = document.getElementById('twContentWarehouses');
  const cQ = document.getElementById('twContentQuotations');

  function setActive(which) {
    const isW = which === 'w';
    if (btnW && btnQ && cW && cQ) {
      btnW.classList.toggle('active', isW);
      btnQ.classList.toggle('active', !isW);
      cW.style.display = isW ? '' : 'none';
      cQ.style.display = isW ? 'none' : '';
    }
  }

  if (btnW) btnW.addEventListener('click', function(e){ e.preventDefault(); setActive('w'); });
  if (btnQ) btnQ.addEventListener('click', function(e){ e.preventDefault(); setActive('q'); });

  document.addEventListener('DOMContentLoaded', () => {
  const tabbar = document.querySelector('.tw-tabbar');
  if (!tabbar) return;

  const tabs = Array.from(tabbar.querySelectorAll('[role="tab"]'));
  const panels = {
    warehouses: document.getElementById('twContentWarehouses'),
    quotations: document.getElementById('twContentQuotations'),
  };

  function activate(tab) {
    const id = tab.dataset.tab;

    tabs.forEach(t => {
      const on = t === tab;
      t.classList.toggle('active', on);
      t.classList.toggle('tw-tab--ghost', !on);
      t.setAttribute('aria-selected', on ? 'true' : 'false');
      t.setAttribute('tabindex', on ? '0' : '-1');
    });

    Object.entries(panels).forEach(([key, el]) => {
      if (!el) return;
      if (key === id) el.removeAttribute('hidden');
      else el.setAttribute('hidden', '');
    });

    tab.focus();
  }

  tabs.forEach(t => t.addEventListener('click', () => activate(t)));

  tabbar.addEventListener('keydown', (e) => {
    const i = tabs.findIndex(t => t.getAttribute('aria-selected') === 'true');
    if (i < 0) return;
    let j = i;
    if (e.key === 'ArrowRight') j = (i + 1) % tabs.length;
    if (e.key === 'ArrowLeft')  j = (i - 1 + tabs.length) % tabs.length;
    if (e.key === 'Home')       j = 0;
    if (e.key === 'End')        j = tabs.length - 1;
    if (j !== i) { e.preventDefault(); activate(tabs[j]); }
  });

  
  const initial = tabs.find(t => t.classList.contains('active')) || tabs[0];
  if (initial) activate(initial);
});


  // Warehouse popup functionality
  const popup = document.getElementById('warehousePopup');
  const closeBtn = document.getElementById('closePopup');
  const cancelBtn = document.getElementById('cancelSearch');
  const overlay = popup ? popup.querySelector('.warehouse-popup-overlay') : null;
  
  // Request quote buttons
  const requestBtns = document.querySelectorAll('.tw-request-btn, .btn-outline-secondary');

  function showPopup() {
    if (popup) {
      popup.classList.add('show');
      document.body.style.overflow = 'hidden';
    }
  }

  function hidePopup() {
    if (popup) {
      popup.classList.remove('show');
      document.body.style.overflow = '';
    }
  }

  
  requestBtns.forEach(btn => {
    btn.addEventListener('click', function(e) {
      e.preventDefault();
      showPopup();
    });
  });

  
  if (closeBtn) {
    closeBtn.addEventListener('click', hidePopup);
  }

  if (cancelBtn) {
    cancelBtn.addEventListener('click', hidePopup);
  }

  if (overlay) {
    overlay.addEventListener('click', hidePopup);
  }

  
  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape' && popup && popup.classList.contains('show')) {
      hidePopup();
    }
  });

  
  const storageOptions = document.querySelectorAll('.storage-option');
  
  storageOptions.forEach(option => {
    const radio = option.querySelector('input[type="radio"]');
    const card = option.querySelector('.storage-option-card');
    
    if (card && radio) {
      card.addEventListener('click', function() {
       
        storageOptions.forEach(opt => opt.classList.remove('active'));
      
        option.classList.add('active');
        
        radio.checked = true;
      });
    }
  });
  const durationInput = document.getElementById('duration');
  const minusBtn = document.querySelector('.duration-btn.minus');
  const plusBtn = document.querySelector('.duration-btn.plus');

  if (minusBtn && durationInput) {
    minusBtn.addEventListener('click', function() {
      const currentValue = parseInt(durationInput.value) || 0;
      if (currentValue > 0) {
        durationInput.value = currentValue - 1;
      }
    });
  }

  if (plusBtn && durationInput) {
    plusBtn.addEventListener('click', function() {
      const currentValue = parseInt(durationInput.value) || 0;
      durationInput.value = currentValue + 1;
    });
  }
  const searchForm = document.querySelector('.warehouse-search-form');
  
  if (searchForm) {
    searchForm.addEventListener('submit', function(e) {
      
      console.log('Form submitted - navigating to results page');
      
      hidePopup();
      
    });
  }
  const paginationBtns = document.querySelectorAll('.tw-pagination-btn');
  let currentPage = 1;
  const totalPages = 20; 
  const itemsPerPage = 4;
  const totalItems = 78;

  function updatePagination() {
    const startItem = (currentPage - 1) * itemsPerPage + 1;
    const endItem = Math.min(currentPage * itemsPerPage, totalItems);
    const paginationInfo = document.querySelector('.tw-pagination-info');
    
    if (paginationInfo) {
      paginationInfo.textContent = `Showing ${startItem}-${endItem.toString().padStart(2, '0')} of ${totalItems}`;
    }

    // Update button states
    const prevBtn = document.querySelector('.tw-pagination-btn:first-child');
    const nextBtn = document.querySelector('.tw-pagination-btn:last-child');
    
    if (prevBtn) {
      prevBtn.disabled = currentPage === 1;
    }
    
    if (nextBtn) {
      nextBtn.disabled = currentPage === totalPages;
    }
  }

  paginationBtns.forEach(btn => {
    btn.addEventListener('click', function() {
      const isPrev = btn.querySelector('.bi-chevron-left');
      const isNext = btn.querySelector('.bi-chevron-right');
      
      if (isPrev && currentPage > 1) {
        currentPage--;
        updatePagination();
      } else if (isNext && currentPage < totalPages) {
        currentPage++;
        updatePagination();
      }
    });
  });

  updatePagination();
})();



