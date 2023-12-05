// vars
let result = document.querySelector('.result'),
    img_result = document.querySelector('.img-result'),
    img_w = document.querySelector('.img-w'),
    img_h = document.querySelector('.img-h'),
    options = document.querySelector('.options'),
    save = document.querySelector('.save'),
    cropped = document.querySelector('.cropped'),
    sub = document.getElementById('uploadButton'),
    dwn = document.querySelector('#image_data'),
    oldImage = document.querySelector('#oldImage'),
    upload = document.querySelector('#file-input'),
    cropper = '';

// on change show image with crop options
upload.addEventListener("change", async (e) => {
    if (e.target.files.length) {
        const imgSrc = await loadImage(e.target.files[0]);

        if (imgSrc) {
            let img = document.createElement("img");
            img.id = "image";
            img.src = imgSrc;
            result.innerHTML = "";
            result.appendChild(img);
            save.classList.remove("hide");
            result.classList.remove("hide");
            oldImage.classList.add("hide");

            cropper = new Cropper(img, {
                aspectRatio: 16 / 9,
                crop: function (e) {
                    console.log(e.detail.width);
                    img_w.value = e.detail.width;
                    console.log(e.detail.height);
                },
            });
        }
    }
});

async function loadImage(file) {
    return new Promise((resolve, reject) => {
        const reader = new FileReader();

        reader.onload = (e) => {
            resolve(e.target.result);
        };

        reader.onerror = (e) => {
            reject(e);
        };

        reader.readAsDataURL(file);
    });
}
save.addEventListener("click", async (e) => {
    e.preventDefault();
    if (cropper) {
        let imgSrc = await getCroppedImage(cropper, img_w.value);
        console.log(imgSrc);

        cropped.classList.remove("hide");
        img_result.classList.remove("hide");
        cropped.src = imgSrc;
        document.getElementById("image_data").value = imgSrc;
        sub.classList.remove("hide");
    } else {
        console.error("Cropper is not initialized.");
    }
});

async function getCroppedImage(cropper, width) {
    return new Promise((resolve, reject) => {
        const canvas = cropper.getCroppedCanvas({ width });
        if (canvas.toDataURL) {
            resolve(canvas.toDataURL());
        } else {
            reject(new Error("Failed to get cropped image."));
        }
    });
}

document.getElementById('uploadButton').addEventListener('click', function (e) {
    document.querySelector('.formBlog').submit();
});
