import Dropzone from "dropzone";

Dropzone.autoDiscover = false;
const dropzone = new Dropzone("#dropzone", {
    dictDefaultMessage: "Upload your image here",
    dictRemoveFile: "Remove",
    acceptedFiles: ".png,.jpg,.jpeg,.gif",
    addRemoveLinks: true,
    maxFiles: 1,
    uploadMultiple: false,
});
