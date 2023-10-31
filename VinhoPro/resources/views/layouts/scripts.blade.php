<!-- Adicione um modal para exibir alertas -->
<div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Erro</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p id="errorMessage"></p>
      </div>
    </div>
  </div>
</div>

<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    const list = document.querySelectorAll(".list");

    function activeLink() {
        list.forEach((item) => item.classList.remove("active"));
        this.classList.add("active");
    }
    list.forEach((item) => item.addEventListener("click", activeLink));

    function showError(message) {
        var errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
        document.getElementById('errorMessage').innerText = message;
        errorModal.show();
    }

</script>

<!-- Adicione o script para iniciar e parar o scanner -->
<script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var scannerElement = document.getElementById('scanner');
    var qrScannerModal = new bootstrap.Modal(document.getElementById('qrScannerModal'));
    var scanner = new Instascan.Scanner({ 
        video: scannerElement,
        facingMode: { exact: 'environment' } // Força o uso da câmera traseira
    });

    function checkCameraPermission() {
        Instascan.Camera.getCameras().then(function (cameras) {
            var rearCamera = cameras.find(function(camera) {
                return camera.name.toLowerCase().includes('back') || camera.name.toLowerCase().includes('traseira');
            });

            if (rearCamera) {
                scanner.start(rearCamera);
            } else {
                showError('Câmera traseira não encontrada. Usando a câmera padrão.');
                scanner.start(cameras[0]); // Use a câmera padrão se a traseira não for encontrada
            }
        }).catch(function (err) {
            showError('Erro ao acessar a câmera: ' + err);
        });
    }

    document.getElementById('qrScannerModal').addEventListener('shown.bs.modal', function () {
        checkCameraPermission();
    });

    document.getElementById('qrScannerModal').addEventListener('hidden.bs.modal', function () {
        scanner.stop(); // Pare o scanner quando o modal é fechado
    });

    scanner.addListener('scan', function (content) {
        if (content) {
            window.location.href = content;
        }
    });
});
</script>
@auth<script>
    // Obtain the ID of the authenticated user, if available
    const userId = <?php echo Auth::user() ? Auth::user()->id : 'null'; ?>;
    
    // Function to format the timestamp
    function formatTimestamp(timestamp) {
        const now = new Date();
        const createdDate = new Date(timestamp);

        const minutesAgo = Math.floor((now - createdDate) / (1000 * 60));

        if (minutesAgo < 1) {
            return 'agora mesmo';
        } else if (minutesAgo < 60) {
            return `há ${minutesAgo} minutos atrás`;
        } else if (minutesAgo < 1440) {
            const hours = Math.floor(minutesAgo / 60);
            const minutes = minutesAgo % 60;
            return `há ${hours} horas e ${minutes} minutos atrás`;
        } else if (minutesAgo < 2880) {
            const hours = createdDate.getHours();
            const minutes = createdDate.getMinutes();
            return `ontem às ${hours}:${minutes}`;
        } else {
            const day = createdDate.getDate();
            const month = createdDate.getMonth() + 1;
            const year = createdDate.getFullYear();
            const hours = createdDate.getHours();
            const minutes = createdDate.getMinutes();
            return `${day}-${month}-${year} às ${hours}:${minutes}`;
        }
    }

    // Check if userId is not null before making the request
    if (userId !== null) {
        // Call the getNotifications method to fetch notifications
        axios.get('/interactions/get-notifications', {
            params: {
                user_id: userId
            }
        })
        .then(response => {
            // Update the list of notifications in the notification icon
            const notificationList = document.getElementById('notification-list');
            const notifications = response.data.notifications;

            // Clear any existing notifications
            notificationList.innerHTML = '';

            // Loop through the notifications and format each one
            notifications.forEach((notification, index) => {
                // Format each notification item as HTML with the formatted timestamp
                const formattedTimestamp = formatTimestamp(notification.created_at);
                const notificationItemHtml = `
                    <li class="notification-item">
                        <div>
                            <p>${notification.comment}</p>
                            <p class="text-danger">${formattedTimestamp}</p>
                        </div>
                    </li>
                `;

                // Append the formatted HTML to the notification list
                notificationList.innerHTML += notificationItemHtml;

                // Add a separator line between notifications, but not after the last one
                if (index < notifications.length - 1) {
                    notificationList.innerHTML += '<li><hr class="dropdown-divider"></li>';
                }
            });
        })
        .catch(error => {
            console.error('Error fetching notifications:', error);
        });
    }
</script>



<script>
    const notificationIcon = document.querySelector('.nav-icon');
    notificationIcon.addEventListener('click', function () {
        // Call the method to mark notifications as read
        axios.post('/interactions/mark-notifications-as-read')
        .then(response => {
            // Update the notification count to 0 and remove the 'has-notifications' class
            const badgeNumber = document.querySelector('.badge-number');
            badgeNumber.textContent = '0';
            notificationIcon.classList.remove('has-notifications');
        })
        .catch(error => {
            console.error('Error marking notifications as read:', error);
        });
    });
</script>
@endauth

<script>
    
  <!-- Vendor JS Files -->
  <script src="/nice/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="/nice/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/nice/assets/vendor/chart.js/chart.umd.js"></script>
  <script src="/nice/assets/vendor/echarts/echarts.min.js"></script>
  <script src="/nice/assets/vendor/quill/quill.min.js"></script>
  <script src="/nice/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="/nice/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="/nice/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="/nice/assets/js/main.js"></script>