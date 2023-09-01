const placeholder = "https://marcolanci.it/utils/placeholder.jpg";
const thumbInput = document.getElementById('image');
const imagePreview = document.getElementById('image-preview');

thumbInput.addEventListener('input', () => {
    imagePreview.src = thumbInput.value ? thumbInput.value : placeholder;
})