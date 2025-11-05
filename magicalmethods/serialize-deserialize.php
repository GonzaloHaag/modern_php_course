<?php 
class User {
    private $name;
    private $email;
    private $password;

    public function __construct(string $name, string $email, string $password) {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    # Indica que informacion quiero devolver al serializar el objeto
    # No quiero incluir el password
    public function __serialize(): array
    {
        return [
            'name' => strtoupper($this->name),
            'email' => $this->email
        ];
    }

    public function __unserialize(array $data): void
    {
        $this->name = $data["name"];
        $this->email = $data["email"];
        $this->password = null;
    }
};

$user = new User("Gonzalo","gonza13@gmail.com","123456");
$s = serialize($user);
echo $s;

$obj = unserialize($s);
print_r($obj);