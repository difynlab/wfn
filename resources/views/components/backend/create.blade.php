<div class="col-12 mb-5">
    <label for="status" class="form-label label">Status<span class="asterisk">*</span></label>

    <div class="radios">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="status" value="1" id="active" checked required>
            <label class="form-check-label" for="active">Active</label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="status" value="2" id="inactive" {{ old('status') == '2' ? 'checked' : '' }} required>
            <label class="form-check-label" for="inactive">Inactive</label>
        </div>
    </div>

    <x-backend.input-error field="status"></x-backend.input-error>
</div>

<div class="col-12">
    <button type="submit" class="submit-button">Save Changes</button>
</div>