document.querySelector("form").addEventListener("submit", function (e) {
  const comment = document
    .querySelector('textarea[name="newList"]')
    .value.trim();
  if (comment.length < 1) {
    e.preventDefault();
  }
});
