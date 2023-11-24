/* Formularios Mostrar y ocultar fieldset class = "hidden toggle" */

const fieldsets = document.querySelectorAll('fieldset.toggle');
const inputs = document.querySelectorAll("input[name='motivo']")

function toogleHidden (inputID) {
  fieldsets.forEach(fieldset => {
    fieldset.classList.add('hidden');
    if(fieldset.id == `fieldset${inputID}` )
    fieldset.classList.remove('hidden')
  })
}

inputs.forEach(input => {
  let inputID = input.id
  input.addEventListener('change', () => {
    toogleHidden(inputID);
  })
})

/* Poner nombre de archivo en input de tipo file */
const inputFiles = document.querySelectorAll(".inputFile");
inputFiles.forEach(input => {
    input.addEventListener('change', () => {
    const selector = `label[for=${input.id}] > span`;
    const span = document.querySelector(selector);
    span.innerHTML = input.files[0].name;
   })

})