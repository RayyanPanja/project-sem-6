const fileInputs = document.querySelectorAll('.form-input[type="file"]');
const CustomUploads = document.querySelectorAll('.file-label');

CustomUploads.forEach((item, index) => {
    item.addEventListener('click', () => {
        fileInputs[index].click();
        fileInputs[index].addEventListener('input', () => {
            item.textContent = fileInputs[index].files[0].name;
            const reader = new FileReader();
            reader.readAsDataURL(fileInputs[index].files[0]);
            reader.onload = function () {
                item.style.backgroundImage = `url(${reader.result})`;
            };
        })
    })
});

