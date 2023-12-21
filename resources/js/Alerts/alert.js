import Swal from 'sweetalert2';
window.Swal = 'sweetalert2';

export function useSwalSuccess(message){
    Swal.fire({
        toast: true, 
        icon: "success",
        title: message,
        animation: false,
        position: "top",
        showConfirmButton: false,
        timer: 10000
      })
}

export function useSwalError(message){
    Swal.fire({
        toast: true, 
        icon: "error",
        title: message,
        animation: false,
        position: "top",
        showConfirmButton: false,
        timer: 10000
      })
}