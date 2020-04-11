db.createUser({
    user: "devboxUser",
    password: "devboxPassword",
    rols: [{
        role: "readWrite",
        db: "devbox"
    }]
});
