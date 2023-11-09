<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div className="d-flex vh-100 justify-content-center align-items-center bg-primary">
        <div className="p-3 bg-white w-25">
            <form action="../backend/traitement/Connexion.php" method="POST" >
                <h1>Login</h1>
                <hr />
                <div className="mb-3">
                    <label htmlFor="username">Username</label>
                    <input type="text" placeholder="Username" name="username" className="form-control"/>
                </div>
                <div className="mb-3">
                    <label htmlFor="">Mot de passe</label>
                    <input type="password" placeholder="Password" name="password" className="form-control"/>
                </div>
                <button className="btn btn-success w-100" type="submit" name="logIn">Log In</button>
                        <hr />
                <button className="btn btn-default bg-light border w-100">Create Account</button>
            </form>
        </div>
        <div className="p-3 bg-white w-25">
            <form action="" method="POST">
                <h1 style=>Sign Up</h1>
                <hr />
                <div className="mb-3">
                    <label htmlFor="username">Username</label>
                    <input type="text" placeholder="Username" name="username" className="form-control"/>
                </div>
                <div className="mb-3">
                    <label htmlFor="email">Email</label>
                    <input type="email" placeholder="Email" name="email" className="form-control"/>
                </div>
                <div className="mb-3">
                    <label htmlFor="password">Mot de passe</label>
                    <input type="password" placeholder="Password" name="password" className="form-control"/>
                </div>
                <button className="btn btn-success w-100" type="submit" name="SingUp">Sign Up</button>
                        <hr />
                <Link to="/login"><button className="btn btn-default bg-light border w-100">Sign In</button></Link>
            </form>
        </div>
    </div>
</body>
</html>