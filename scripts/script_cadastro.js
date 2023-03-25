document.addEventListener('DOMContentLoaded', () => {
  const fileChooser = document.querySelector('.input-file');
  if (fileChooser) {
    const $ = document.querySelector.bind(document);

    const previewImg = $('.imagem');
    const fileChooser = $('.input-file');

    fileChooser.onchange = e => {
      const fileToUpload = e.target.files.item(0);
      const reader = new FileReader();
      reader.onload = e => previewImg.src = e.target.result;
      reader.readAsDataURL(fileToUpload);
    };
  }
});

window.addEventListener('keydown', validar)
function validar() {
  $(function inputpassWord() {
    let password = $("#password").val()
    let rePassword = $("#re-password").val()

    if (password.length < 3 || password == null || rePassword != password) {
      $("#password").removeClass("is-valid")
      $("#re-password").removeClass("is-valid")
      $("#password").addClass("is-invalid")
      $("#re-password").addClass("is-invalid")
    }
    else {
      $("#password").addClass("is-valid")
      $("#password").removeClass("is-invalid")
      $("#re-password").addClass("is-valid")
      $("#re-password").removeClass("is-invalid")
    }
  })
}
