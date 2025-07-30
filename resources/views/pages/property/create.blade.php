@extends('layouts.master')
@section('title', 'Create Property')

@section('style')
<style>
    .preview-image-container {
        margin-top: 15px;
        text-align: center;
    }
    .preview-image {
        max-width: 100%;
        max-height: 300px;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        display: none;
    }
    .required-field::after {
        content: " *";
        color: red;
    }
    .form-section {
        margin-bottom: 25px;
        padding: 20px;
        border-radius: 5px;
        background: #f8f9fa;
    }
    .form-section h5 {
        border-bottom: 1px solid #dee2e6;
        padding-bottom: 10px;
        margin-bottom: 20px;
    }
    .character-counter {
        font-size: 0.8rem;
        color: #6c757d;
        text-align: right;
    }
</style>
@endsection

@section('page')
<div class="row">
    <div class="col-md-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="mb-0">Add New Property</h4>
            <a class="btn btn-outline-secondary" href="{{ route('propertys.index') }}">
                <i class="fas fa-arrow-left me-1"></i> Back to List
            </a>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-header bg-primary text-white py-3">
                <h5 class="mb-0"><i class="fas fa-home me-2"></i>Property Information</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('propertys.store') }}" method="post" enctype="multipart/form-data" id="property-form">
                    @csrf

                    <div class="form-section">
                        <h5><i class="fas fa-info-circle me-2"></i>Basic Information</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label required-field">Title</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                           name="title" id="title" placeholder="Modern Apartment in Downtown" 
                                           value="{{ old('title') }}" required maxlength="100">
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="category_id" class="form-label required-field">Category</label>
                                    <select class="form-select @error('category_id') is-invalid @enderror" 
                                            name="category_id" id="category_id" required>
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label required-field">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      name="description" id="description" rows="5" 
                                      placeholder="Detailed description of the property" 
                                      required maxlength="1000">{{ old('description') }}</textarea>
                            <div class="character-counter"><span id="description-counter">1000</span> characters remaining</div>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-section">
                        <h5><i class="fas fa-ruler-combined me-2"></i>Property Details</h5>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="sqft" class="form-label required-field">Area (sqft)</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control @error('sqft') is-invalid @enderror" 
                                               name="sqft" id="sqft" placeholder="700" 
                                               value="{{ old('sqft') }}" min="700" step="1" required>
                                        <span class="input-group-text">sqft</span>
                                    </div>
                                    @error('sqft')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="bed_room" class="form-label required-field">Bedrooms</label>
                                    <select class="form-select @error('bed_room') is-invalid @enderror" 
                                            name="bed_room" id="bed_room" required>
                                        @for($i = 1; $i <= 10; $i++)
                                            <option value="{{ $i }}" {{ old('bed_room') == $i ? 'selected' : '' }}>
                                                {{ $i }} {{ $i == 1 ? 'Bedroom' : 'Bedrooms' }}
                                            </option>
                                        @endfor
                                        <option value="11" {{ old('bed_room') == '11' ? 'selected' : '' }}>11+ Bedrooms</option>
                                    </select>
                                    @error('bed_room')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="bath_room" class="form-label required-field">Bathrooms</label>
                                    <select class="form-select @error('bath_room') is-invalid @enderror" 
                                            name="bath_room" id="bath_room" required>
                                        @for($i = 1; $i <= 10; $i++)
                                            <option value="{{ $i }}" {{ old('bath_room') == $i ? 'selected' : '' }}>
                                                {{ $i }} {{ $i == 1 ? 'Bathroom' : 'Bathrooms' }}
                                            </option>
                                        @endfor
                                        <option value="11" {{ old('bath_room') == '11' ? 'selected' : '' }}>11+ Bathrooms</option>
                                    </select>
                                    @error('bath_room')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-section">
                        <h5><i class="fas fa-dollar-sign me-2"></i>Pricing & Status</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="price" class="form-label required-field">Price</label>
                                    <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        <input type="number" class="form-control @error('price') is-invalid @enderror" 
                                               name="price" id="price" placeholder="0.00" 
                                               value="{{ old('price') }}" min="0" step="0.01" required>
                                    </div>
                                    @error('price')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="status" class="form-label required-field">Status</label>
                                    <select class="form-select @error('status') is-invalid @enderror" 
                                            name="status" id="status" required>
                                        <option value="">Select Status</option>
                                        <option value="Available" {{ old('status') == 'For Sale' ? 'selected' : '' }}>Available</option>
                                        <option value="For Sale" {{ old('status') == 'For Sale' ? 'selected' : '' }}>For Sale</option>
                                        <option value="For Rent" {{ old('status') == 'For Rent' ? 'selected' : '' }}>For Rent</option>
                                        <option value="Sold" {{ old('status') == 'Sold' ? 'selected' : '' }}>Sold</option>
                                        <option value="Rented" {{ old('status') == 'Rented' ? 'selected' : '' }}>Rented</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-section">
                        <h5><i class="fas fa-map-marker-alt me-2"></i>Location Details</h5>
                        <div class="mb-3">
                            <label for="location" class="form-label required-field">Full Address</label>
                            <input type="text" class="form-control @error('location') is-invalid @enderror" 
                                   name="location" id="location" placeholder="Enter full address" 
                                   value="{{ old('location') }}" required>
                            @error('location')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-section">
                        <h5><i class="fas fa-image me-2"></i>Property Images</h5>
                        <div class="mb-3">
                            <label for="photo" class="form-label required-field">Main Photo</label>
                            <input type="file" class="form-control @error('photo') is-invalid @enderror" 
                                   name="photo" id="photo" accept="image/*" required>
                            <small class="text-muted">Upload a high-quality image (JPEG, PNG, max 5MB)</small>
                            @error('photo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                         
                        </div>
                    </div>

                    <div class="form-section">
                        <h5><i class="fas fa-user-tie me-2"></i>Project Information</h5>
                        <div class="mb-3">
                            <label for="project_id" class="form-label required-field">Assigned Project</label>
                            <select class="form-select @error('project_id') is-invalid @enderror" 
                                    name="project_id" id="project_id" required>
                                <option value="">Select project</option>
                                @foreach($projects as $project)
                                    <option value="{{ $project->id }}" {{ old('project_id') == $project->id ? 'selected' : '' }}>
                                        {{ $project->name }} 
                                    </option>
                                @endforeach
                            </select>
                            @error('project_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <button type="reset" class="btn btn-outline-secondary">
                            <i class="fas fa-undo me-1"></i> Reset Form
                        </button>
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="fas fa-save me-1"></i> Save Property
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    
    function previewImage(input) {
        const preview = document.getElementById('image-preview');
        const file = input.files[0];
        const maxSize = 5 * 1024 * 1024; // 5MB
        
        if (file) {
        
            if (file.size > maxSize) {
                alert('File size exceeds 5MB limit');
                input.value = '';
                preview.style.display = 'none';
                return;
            }
            
            const reader = new FileReader();
            
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            
            reader.readAsDataURL(file);
        } else {
            preview.style.display = 'none';
            preview.src = '';
        }
    }


    document.getElementById('description').addEventListener('input', function() {
        const maxLength = 1000;
        const currentLength = this.value.length;
        const remaining = maxLength - currentLength;
        
        document.getElementById('description-counter').textContent = remaining;
        
        if (remaining < 50) {
            document.getElementById('description-counter').style.color = 'red';
        } else {
            document.getElementById('description-counter').style.color = '#6c757d';
        }
    });

  
    document.addEventListener('DOMContentLoaded', function() {
        const desc = document.getElementById('description');
        const remaining = 1000 - desc.value.length;
        document.getElementById('description-counter').textContent = remaining;
    });


    document.getElementById('property-form').addEventListener('submit', function(e) {
        let isValid = true;
        
    
        this.querySelectorAll('.is-invalid').forEach(el => {
            el.classList.remove('is-invalid');
            const errorDiv = el.nextElementSibling;
            if (errorDiv && errorDiv.classList.contains('invalid-feedback')) {
                errorDiv.remove();
            }
        });
        
   
        this.querySelectorAll('[required]').forEach(field => {
            if (!field.value.trim()) {
                isValid = false;
                field.classList.add('is-invalid');
                
                const errorDiv = document.createElement('div');
                errorDiv.className = 'invalid-feedback';
                errorDiv.textContent = 'This field is required';
             
                field.parentNode.insertBefore(errorDiv, field.nextSibling);
            }
        });
        
  
        const fileInput = document.getElementById('photo');
        if (fileInput.files.length === 0) {
            isValid = false;
            fileInput.classList.add('is-invalid');
            
            const errorDiv = document.createElement('div');
            errorDiv.className = 'invalid-feedback';
            errorDiv.textContent = 'Please upload a property photo';
            fileInput.parentNode.insertBefore(errorDiv, fileInput.nextSibling);
        }
        
        if (!isValid) {
            e.preventDefault();
            
   
            const firstError = this.querySelector('.is-invalid');
            if (firstError) {
                firstError.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
                
   
                if (firstError.tagName === 'INPUT' || firstError.tagName === 'SELECT' || firstError.tagName === 'TEXTAREA') {
                    firstError.focus();
                }
            }
        }
    });


    function initAutocomplete() {
        if (typeof google !== 'undefined') {
            const input = document.getElementById('location');
            const autocomplete = new google.maps.places.Autocomplete(input, {
                types: ['geocode'],
                componentRestrictions: {country: 'us'} 
            });
            
            autocomplete.addListener('place_changed', function() {
                const place = autocomplete.getPlace();
                if (!place.geometry) {
                
                    console.log("No details available for input: '" + place.name + "'");
                    return;
                }
            });
        }
    }
    

    function loadGoogleMapsAPI() {
        const script = document.createElement('script');
        script.src = `https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places&callback=initAutocomplete`;
        script.async = true;
        script.defer = true;
        document.head.appendChild(script);
    }
    

</script>
@endsection