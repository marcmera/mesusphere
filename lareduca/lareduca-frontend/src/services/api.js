import axios from 'axios';
axios.get('http://localhost:8000/api/user', {
withCredentials: true // Importante para el manejo de sesiones con Sanctum
})
.then(response => {
console.log(response.data);
})
.catch(error => {
console.error(error);
});