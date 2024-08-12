function fetchUsers() {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'configs/fetch_users.php', true);
    xhr.onload = function() {
        if (this.status === 200) {
            const users = JSON.parse(this.responseText);
            let userCards = '';
            users.forEach(function(user) {
                userCards += `
                    <div class="card swiper-slide">
                        <div class="image-content">
                            <span class="overlay"></span>
                            <div class="card-image">
                                <img src="${user.profile_picture ? user.profile_picture : 'default-profile.png'}" alt="Profile Picture" class="card-img">
                            </div>
                        </div>
                        <div class="card-content">
                            <h2 class="name">${user.full_name}</h2>
                            <p class="description">Username: ${user.username}</p>
                            <p class="description">Email: ${user.email}</p>
                            <p class="description">Phone: ${user.phone}</p>
                            <p class="description">Gender: ${user.gender}</p>
                            <div class="card-actions">
                                <form action="dashboard.php" method="post" style="display:inline;">
                                    <input type="hidden" name="user_id" value="${user.id}">
                                    <button type="submit" name="delete" class="button delete">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                `;
            });
            document.getElementById('user-cards').innerHTML = userCards;

            // Reinitialize Swiper to update the slides
            swiper.update();
        }
    };
    xhr.send();
}

var swiper = new Swiper(".slide-content", {
    slidesPerView: 3,
    spaceBetween: 25,
    loop: true,
    centerSlide: 'true',
    fade: 'true',
    grabCursor: 'true',
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
        dynamicBullets: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    breakpoints: {
        0: {
            slidesPerView: 1,
        },
        520: {
            slidesPerView: 2,
        },
        950: {
            slidesPerView: 3,
        },
    },
});

// Fetch users initially and then every 5 seconds
fetchUsers();
setInterval(fetchUsers, 5000);

// Show notification if it exists
window.onload = function() {
    var notification = document.getElementById('notification');
    if (notification.textContent.trim() !== '') {
        notification.style.display = 'block';
        setTimeout(function() {
            notification.style.display = 'none';
        }, 3000);
    }
};