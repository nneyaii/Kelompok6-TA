<?php
include 'login.php'; // pastikan $conn sudah ada

session_start();

$error = ""; // Variabel untuk menampung pesan error

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email    = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM login WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result && $result->num_rows === 1) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            $_SESSION['user_email'] = $user['email'];
            header("Location: index.php");
            exit();
        } else {
            $error = "<strong>Password salah!</strong> Silakan cek kembali dan coba lagi.";
        }
    } else {
        $error = "<strong>Akun tidak ditemukan!</strong> Pastikan email sudah benar.";
    }
    $stmt->close();
}
?>

<!-- Modal Pop-up Error -->
<div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="background-color: #f8d7da; color: #842029;">
      <div class="modal-header">
        <h5 class="modal-title" id="errorModalLabel">Login Gagal</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php echo $error; ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<!-- Show Modal via JavaScript -->
<?php if (!empty($error)): ?>
<script>
  document.addEventListener("DOMContentLoaded", function () {
    var errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
    errorModal.show();
  });
</script>
<?php endif; ?>
