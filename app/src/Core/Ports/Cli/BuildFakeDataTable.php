<?php


namespace App\Core\Ports\Cli;


use App\Core\Application\Command\User\CreateUserDTO;
use App\Core\Application\Command\User\UserPasswordDTO;
use App\Core\Domain\Model\Users\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class BuildFakeDataTable extends Command
{
    /** @var EntityManagerInterface */
    private $entityManager;

    public function __construct(
        string $name = null,
        EntityManagerInterface $entityManager
    )
    {
        parent::__construct($name);
        $this->entityManager = $entityManager;
    }

    protected function configure()
    {
        $this
            ->setName('fake:data:table')
            ->setDescription('This command create fake data-table to testing all app')
            ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $createUserDTO = new CreateUserDTO();
        $createUserDTO->setEmail('bohema.michal@gmail.com');
        $createUserDTO->setFirstName('admin');
        $createUserDTO->setLastName('admin');
        $createUserDTO->setUsername('admin');
        $createUserDTO->setRoles(['ROLE_ADMIN']);
        $createUserDTO->setEnable(true);

        $passwordDTO = new UserPasswordDTO();
        $passwordDTO->setPassword(password_hash('qwerty123', PASSWORD_DEFAULT));

        $user = new User();
        $user->createUsers($createUserDTO);
        $user->addPassword($passwordDTO);

        $this->entityManager->persist($user);
        $this->entityManager->flush();

        return 1;
    }

}