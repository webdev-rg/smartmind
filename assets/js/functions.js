// Message Functions
export const warningMessage = (warningMessage) => {
  const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 2000,
    timerProgressBar: true,
    width: "400px",
  });

  Toast.fire({
    icon: "warning",
    iconColor: "#2a86ff",
    title: `<h2 style="line-height: 2.2;">${warningMessage}</h2>`,
  });
};

export const errorMessage = (errorMessage) => {
  const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 2000,
    timerProgressBar: true,
    width: "400px",
  });

  Toast.fire({
    icon: "error",
    iconColor: "#f44336",
    title: `<h2 style="line-height: 2.2;">${errorMessage}</h2>`,
  });
};

export const successMessage = (successMessage) => {
  const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 2000,
    timerProgressBar: true,
    width: "400px",
  });

  Toast.fire({
    icon: "success",
    iconColor: "#00c851",
    title: `<h2 style="line-height: 2.2;">${successMessage}</h2>`,
  });
};

