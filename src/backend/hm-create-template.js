let beforeSubmit = document.getElementById('before-submit')
console.log('start')

const checkbox = document.createElement('input type="checkbox">')
for (let i = 0; i < 2; i++){
  const scenario = document.createElement('<label>Scenario #1</label>')
  beforeSubmit.appendChild(scenario)
  beforeSubmit.appendChild(checkbox)
  console.log("meow")
}