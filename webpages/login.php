<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link rel = "stylesheet" href="../public/css/style1.css">
    <title>Login Page</title>
</head>
<body>
     <div class="container">
         <h1>Log In</h1>
         <form action="admin.php" method="POST">
            <div class="form-control">
                <input type="text" required  name="email">
                <label>Email</label>
            </div>

            <div class="form-control">
                <input type="password" required  name="password">
                <label>Password</label>
            </div>

            <button class="btn">LOG IN</button>
         </form>
     </div>
<script> 
const labels = document.querySelectorAll('.form-control label')
labels.forEach(label => {
    label.innerHTML = label.innerText
    .split('')
    .map((letter,idx) => `<span style="transition-delay:${idx*50}ms">${letter}</span>`)
    .join('')
})
</script>
</body>
</html>