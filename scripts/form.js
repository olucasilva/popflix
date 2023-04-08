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