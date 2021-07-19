const form = document.querySelector("form");
const nameInput = document.querySelector("[name = 'name']");
const aboutInput = document.querySelector("[name = 'about']");
const fileInput = document.querySelector("[type = 'file']");

form.addEventListener("submit", (e) => {
  // console.clear();
  e.preventDefault();

  let data = new FormData(form);

  // fetch("./php/server.php", {
  //   method: "post",
  //   body: data,
  // })
  //   .then(function (res) {
  //     return res.text();
  //   })
  //   .then(function (text) {
  //     console.log(text);
  //   })
  //   .catch((err) => console.log(err));

  axios
    .request({
      method: "post",
      url: "./php/server.php",
      data: data,
    })
    .then((data) => {
      console.log(data);
    });
});
