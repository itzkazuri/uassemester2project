const menuToggle = document.querySelector('.menu-toggle input');
const nav = document.querySelector('.navbar-nav');

menuToggle.addEventListener('click', function () {
  nav.classList.toggle('slide');
});

// document.getElementById('harga-container').addEventListener('click', function (event) {
//   if (event.target.closest('.data-list-harga')) {
//     const session = event.target.closest('.data-list-harga');
//     const dropdown = session.querySelector('.dropdown-detail-harga');
//     const toggleImg = session.querySelector('.img-toggel');
//     const activeElement = document.querySelector('.data-list-harga.active');

//     if (activeElement && activeElement !== session) {
//       activeElement.classList.remove('active');
//       const activeDropdown = activeElement.querySelector('.dropdown-detail-harga');
//       activeDropdown.style.maxHeight = '0';
//       activeElement.querySelector('.img-toggel').classList.remove('rotate');
//     }

//     if (session.classList.contains('active')) {
//       session.classList.remove('active');
//       dropdown.style.maxHeight = '0';
//       toggleImg.classList.remove('rotate');
//     } else {
//       session.classList.add('active');
//       dropdown.style.maxHeight = dropdown.scrollHeight + 'px';
//       toggleImg.classList.add('rotate');
//     }
//   }
// });
