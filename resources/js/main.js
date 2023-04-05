function previewImage(event) {
    var reader = new FileReader();
    reader.onload = function() {
        var image = document.getElementById('image-preview');
        image.src = reader.result;
        image.style.display = 'block';
    }
    reader.readAsDataURL(event.target.files[0]);
}
