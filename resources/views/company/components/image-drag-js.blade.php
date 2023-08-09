<script>
const imagesPreviewBox = document.getElementById("images-preview");
const dropArea = document.getElementById("image-drag-area");

const dragText = dropArea.querySelector("label")
const button = dropArea.querySelector("button")
const input = dropArea.querySelector("input");
let canShowAlert = true;
let imagesCount = 0;

button.onclick = () => {
  input.click();
}

input.addEventListener("change", function() {
  dropArea.classList.add("active");
  processFiles(this.files);
});


dropArea.addEventListener("dragover", (event)=>{
  event.preventDefault();
  dropArea.classList.add("active");
  dragText.textContent = "Отпустите, чтобы загрузить";
});

dropArea.addEventListener("dragleave", ()=>{
  dropArea.classList.remove("active");
  dragText.textContent = "Перетащите сюда изображения";
});

dropArea.addEventListener("drop", (event)=>{
    event.preventDefault();
    processFiles(event.dataTransfer.files);
});

function processFiles(files) {
    for (let i = 0; i < files.length; i++) {
        tryShowFile(files[i])
    }
    canShowAlert = true;
}

function createImageTag(fileUrl) {
    let image = document.createElement("img");
    image.setAttribute('src', fileUrl);
    image.setAttribute('alt', 'preview-image');
    image.classList.add('upload-image-preview');
    return image;
}

function checkFile(file) {
    let validExtensions = ["image/jpeg", "image/jpg", "image/png"];
    if (!validExtensions.includes(file.type)) {
        if (canShowAlert) {
            alert("Для загрузки доступны только изображения в формате jpg, jpeg и png!");
            canShowAlert = false;
        }
        return false;
    }
    if (imagesCount >= 15) {
        if (canShowAlert) {
            alert("Можно добавить максимум пять изображений!");
            canShowAlert = false;
        }
        return false;
    }
    return true;
}

function tryShowFile(file) {
    if (!checkFile(file)) {
        dropArea.classList.remove("active");
        dragText.textContent = "Перетащите сюда изображения";
        return;
    }

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