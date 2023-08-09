<script>
const imagesPreviewBox = document.getElementById("images-preview");
const imagesInput = document.getElementById("imagesInput");
let imagesCount;

function clearImageFiles() {
    imagesPreviewBox.replaceChildren();
    imagesInput.value = "";
}

imagesInput.addEventListener("change", function(event) {
    imagesPreviewBox.replaceChildren();
    if (this.files.length > 5) {
        alert('Можно добавить максимум пять изображений!');
        imagesInput.value = "";
        return;
    }
    if (!checkFilesExtension(this.files)) {
        alert('Для загрузки доступны только изображения в формате jpg, jpeg и png!');
        imagesInput.value = "";
        return;
    }
    processFiles(this.files);
});


function processFiles(files) {
    for (let i = 0; i < files.length; i++) {
        showFile(files[i])
    }
}

function createImageTag(fileUrl) {
    let image = document.createElement("img");
    image.setAttribute('src', fileUrl);
    image.setAttribute('alt', 'preview-image');
    image.classList.add('upload-image-preview');
    image.width = 200;
    image.height = 160;
    return image;
}

function checkFilesExtension(files) {
    let validExtensions = ["image/jpeg", "image/jpg", "image/png"];
    for (let i = 0; i < files.length; i++) {
        if (!validExtensions.includes(files[i].type)) {
            return false;
        }
    }
    return true;
}


function showFile(file) {
    let fileReader = new FileReader();
    fileReader.onload = ()=>{
        let fileURL = fileReader.result;
        const imageTag = createImageTag(fileURL); 
        imagesPreviewBox.appendChild(imageTag);
    }
    fileReader.readAsDataURL(file);
    imagesCount += 1;
}
</script>