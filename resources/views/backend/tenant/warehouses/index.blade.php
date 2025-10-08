@extends('backend.layouts.app')
@section('title','Warehouses')

@push('after-styles')
<link href="{{ asset('backend/css/tenant-warehouses.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="page-wrap">

  {{-- Header --}}
  <div class="tw-header mb-3">
    <div>
      <h1 class="tw-title">Warehouses</h1>
      <div class="tw-desc">Manage Warehouse details and activities here.</div>
    </div>
    <a class="tw-request-btn" href="#"><i class="bi bi-envelope me-1"></i> Request a Quote</a>
  </div>

  {{-- Tabs --}}
  {{-- <div class="mb-4">
    <div class="tw-tabs">
      <div class="tw-tabbar">
        <button id="twTabWarehouses" class="tw-tab active">
          <i class="bi bi-houses"></i>
          Warehouses
        </button>
        <button id="twTabQuotations" class="tw-tab tw-tab--ghost">
          <i class="bi bi-envelope tw-tab-icon"></i>
          Quotations
        </button>
      </div>
    </div> --}}

    <div class="tw-tabbar" role="tablist" aria-label="Warehouse sections">
  <button id="twTabWarehouses" class="tw-tab active"
          role="tab" aria-selected="true" aria-controls="twContentWarehouses"
          tabindex="0" data-tab="warehouses">
    <i class="bi bi-houses"></i> Warehouses
  </button>

  <button id="twTabQuotations" class="tw-tab tw-tab--ghost"
          role="tab" aria-selected="false" aria-controls="twContentQuotations"
          tabindex="-1" data-tab="quotations">
    <i class="bi bi-envelope tw-tab-icon"></i> Quotations
  </button>
</div>

<div class="p-3">
  <div id="twContentWarehouses" role="tabpanel" aria-labelledby="twTabWarehouses">
    <div class="p-3">
      <div class="mx-auto" style="max-width:740px;">
        <div class="tw-card text-center">
          <img src="{{ asset('storage/frontend/test_w.png') }}" alt="Warehouses" class="image-w">
          <div class="tw-empty-title">No Warehouses yet</div>
          <p class="text-muted mb-3">
            Request and approve a quote then come back to view and manage your warehouse.
          </p>
          <a class="btn btn-outline-secondary btn-sm" href="#">
            <i class="bi bi-envelope me-1"></i> Request a quote
          </a>
        </div>
      </div>
    </div>
  </div>

  <div id="twContentQuotations" role="tabpanel" aria-labelledby="twTabQuotations" hidden>
    <div class="p-3">
      <div class="tw-card p-3">
        <div class="table-responsive">
          <table class="table tw-table">
            <thead>
              <tr>
                <th>WAREHOUSE NAME</th>
                <th>ISSUE DATE</th>
                <th>START DATE</th>
                <th>AVAILABLE PALLETS</th>
                <th>RENTED PALLETS</th>
                <th>STATUS</th>
                <th>ACTIONS</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Al Faisal Logistics Hub</td>
                <td>2025/01/20</td>
                <td>2025/03/20</td>
                <td>50 Pallets</td>
                <td>50 Pallets</td>
                <td><span class="status active-status">Active</span></td>
                <td>
                  <a href="#" class="action-button edit-button" title="Edit"><i class="bi bi-pencil-square"></i></a>
                  <a href="#" class="action-button delete-button" title="Delete"><i class="bi bi-trash3"></i></a>
                </td>
              </tr>
              <tr>
                <td>Riyadh Warehousing Solutions</td>
                <td>2025/01/20</td>
                <td>2025/04/20</td>
                <td>50 Pallets</td>
                <td>50 Pallets</td>
                <td><span class="status inactive-status">Inactive</span></td>
                <td>
                  <a href="#" class="action-button edit-button" title="Edit"><i class="bi bi-pencil-square"></i></a>
                  <a href="#" class="action-button delete-button" title="Delete"><i class="bi bi-trash3"></i></a>
                </td>
              </tr>
              <tr>
                <td>Red Sea Distribution Center</td>
                <td>2025/01/20</td>
                <td>2025/05/20</td>
                <td>50 Pallets</td>
                <td>50 Pallets</td>
                <td><span class="status active-status">Active</span></td>
                <td>
                  <a href="#" class="action-button edit-button" title="Edit"><i class="bi bi-pencil-square"></i></a>
                  <a href="#" class="action-button delete-button" title="Delete"><i class="bi bi-trash3"></i></a>
                </td>
              </tr>
              <tr>
                <td>Eastern Gate Storage Facility</td>
                <td>2025/01/20</td>
                <td>2025/06/20</td>
                <td>50 Pallets</td>
                <td>50 Pallets</td>
                <td><span class="status active-status">Active</span></td>
                <td>
                  <a href="#" class="action-button edit-button" title="Edit"><i class="bi bi-pencil-square"></i></a>
                  <a href="#" class="action-button delete-button" title="Delete"><i class="bi bi-trash3"></i></a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        
        {{-- Pagination --}}
        <div class="tw-pagination">
          <div class="tw-pagination-info">
            Showing 1-04 of 78
          </div>
          <div class="tw-pagination-controls">
            <button class="tw-pagination-btn" disabled>
              <i class="bi bi-chevron-left"></i>
            </button>
            <button class="tw-pagination-btn">
              <i class="bi bi-chevron-right"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
  </div>

</div>

{{-- Warehouse Exchange Popup --}}
<div id="warehousePopup" class="warehouse-popup">
  <div class="warehouse-popup-overlay"></div>
  <div class="warehouse-popup-content">
    <div class="warehouse-popup-header">
      <div class="warehouse-search-header">
        <h3>Search for a specific warehouse</h3>
        <p>Fill out this quick form and get started with your searching experience with us.</p>
      </div>
      <button class="warehouse-popup-close" id="closePopup">
        <i class="bi bi-x-lg"></i>
      </button>
    </div>
    
    <div class="warehouse-popup-body">
      <form class="warehouse-search-form" action="{{ route('tenant.warehouses.filterwarehouses') }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="city">City</label>
          <select id="city" name="city" class="form-control">
            <option value="">Please select the city you are looking to store in</option>
            <option value="riyadh">Riyadh</option>
            <option value="jeddah">Jeddah</option>
            <option value="dammam">Dammam</option>
            <option value="mecca">Mecca</option>
          </select>
        </div>
        
        <div class="form-group">
          <label for="warehouseType">Warehouse Type</label>
          <select id="warehouseType" name="warehouseType" class="form-control">
            <option value="">Please select the warehouse type</option>
            <option value="cold-storage">Cold Storage</option>
            <option value="dry-storage">Dry Storage</option>
          </select>
        </div>
        
        <div class="form-group">
          <label for="licensing">Licensing <span class="optional">(Optional)</span></label>
          <select id="licensing" name="licensing" class="form-control">
            <option value="">Please select the warehouse type</option>
          </select>
        </div>
        
        <div class="form-group">
          <label>Storage Type</label>
          <div class="storage-type-options">
            <div class="storage-option active">
              <input type="radio" id="pallets" name="storageType" value="pallets" checked>
              <label for="pallets" class="storage-option-card d-block p-3 border rounded-3">
                <div class="row g-3 align-items-start">
                  <div class="col-12 col-md-9">
                    <h4 class="mb-2">Pallets</h4>
                    <ul class="mb-0">
                      <li>Pallet: The bottom base on which cartons/boxes are arranged.</li>
                      <li>Standard Pallet Dimensions: 1.2m (L) x 1.0m (W) x 1.6m (H)</li>
                      <li>This option is ideal if your stock is coming directly from suppliers/manufacturers on pallets, or for separate cartons/boxes that can be placed on pallets (additional costs might incur for pallet building).</li>
                    </ul>
                  </div>
                  <div class="col-12 col-md-3 text-center text-md-start">
                    <img src="{{ asset('storage/frontend/test_s_popup.png') }}" alt="Pallets" class="image-p">
                  </div>
                </div>
              </label>
            </div>

            <div class="storage-option active">
              <input type="radio" id="freeSpace" name="storageType" value="freeSpace">
              <label for="freeSpace" class="storage-option-card">
                <div class="row g-3 align-items-start">
                  <div class="col-12 col-md-9">
                    <h4 class="mb-2">Free Space</h4>
                    <ul class="mb-0">
                      <li>Floor area: is measured in square meters, with a height of 1.5m. It serves various purposes, particularly for accommodating heavy equipment or anything that cannot be placed on a pallet.</li>
                    </ul>
                  </div>
                  <div class="col-12 col-md-3 text-center text-md-start">
                    <img src="{{ asset('storage/frontend/test_f_popup.png') }}" alt="Free Space" class="image-f">
                  </div>
                </div>
              </label>
            </div>
          </div>
        </div>
        
        <div class="form-group">
          <label for="palletPositions">How many pallet positions do you expect to reserve?</label>
          <input type="number" id="palletPositions" name="palletPositions" class="form-control" placeholder="Enter number of pallet positions" min="1">
        </div>
        
        <div class="form-group">
          <label for="duration">Duration of storage needed</label>
          <div class="duration-input">
            <button type="button" class="duration-btn minus">-</button>
            <input type="number" id="duration" name="duration" class="form-control duration-number" value="0" min="0">
            <button type="button" class="duration-btn plus">+</button>
            <span class="duration-label">Months</span>
          </div>
        </div>
        
        <div class="form-actions">
          <button type="button" class="btn btn-secondary" id="cancelSearch">Cancel</button>
          <button type="submit" class="btn btn-primary">Search Warehouses</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@push('after-scripts')
<script src="{{ asset('backend/js/tenant-warehouses.js') }}"></script>
@endpush
