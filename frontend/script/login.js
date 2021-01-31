const btn = document.getElementById('btn_login');
btn.addEventListener('click', (ev) =>  {
    ev.preventDefault(); // empêche l'évènement de se propager
    submitForm();
})
console.log('Bienvenue');

// Ajout des données du formulaire
function submitForm(){
    let formParams = new URLSearchParams();
    formParams.append('identifiant','pseudo');
    formParams.append('password', 'password');
    let headers = new Headers();
    headers.append('Accept', 'application/json');
    const requestOptions = {
        method: 'POST',
        body: formParams,
        Headers:headers
    }
fetch('connexion.php, requestOptions') // Il faudrait envoyer les champs du formulaire au serveur
.then(response => response.json()) // Indique au serveur un retour en json
.then(data => console.log('data'))
}