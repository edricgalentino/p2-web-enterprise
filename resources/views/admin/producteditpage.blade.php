<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Edit {{ $product->name }}</hjson>
        <form action="{{ url('/product/' . $product->id . '/edit') }}" method="POST" enctype="multipart/form-data" class="mb-4">
            @csrf
            @method('PATCH')
            <!-- Product Photos -->
            <div class="form-group">
                <label class="fs-5" for="photos">Product Photos:</label>
                <input type="file" name="photos" class="form-control" id="photos" multiple value="{{ $product->image }}" onchange="previewImage()" accept="image/*">
                {{-- current image --}}
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" id="image-preview" class="mt-2" style="max-width: 200px;">
            </div>

            <!-- Product Name -->
            <div class="form-group">
                <label class="fs-5" for="name">Product Name:</label>
                <input type="text" name="name" class="form-control" id="name" required value="{{ $product->name }}">
            </div>
            
            <!-- Year Created -->
            <div class="form-group">
                <label class="fs-5" for="year_created">Year Created:</label>
                <input type="number" name="year_created" class="form-control" id="year_created" required value="{{ $product->year }}">
            </div>

            <!-- Condition -->
            <div class="form-group">
                <label class="fs-5" for="condition">Condition:</label>
                <select name="condition" class="form-control" id="condition" required value="{{ $product->condition }}">
                    <option value="new">New</option>
                    <option value="used">Used</option>
                </select>
            </div>

            <!-- Product Description -->
            <div class="form-group">
                <label class="fs-5" for="description">Product Description:</label>
                <textarea name="description" class="form-control" id="description" rows="3" required value="{{ $product->description }}">{{ $product->description }}</textarea>
            </div>

            <!-- Price -->
            <div class="form-group">
                <label class="fs-5" for="price">Price:</label>
                <input type="text" name="price" class="form-control" id="price" required value="{{ $product->price }}">
            </div>

            <!-- Stock -->
            <div class="form-group">
                <label class="fs-5" for="stock">Stock:</label>
                <input type="number" name="stock" class="form-control" id="stock" required value="{{ $product->stock }}">
            </div>

            <div class="d-flex justify-content-end w-full align-items-center">
                <!-- Back Button -->
                <a href="{{ url('/product') }}" class="btn btn-secondary">Back</a>
                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary mx-4">Submit</button>
            </div>
        </form>
        
    </div>

    <script>
        // create a function to preview image
        function previewImage() {
            // get image file
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("photos").files[0]);

            oFReader.onload = function(oFREvent) {
                document.getElementById("image-preview").src = oFREvent.target.result;
            };
        };
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>