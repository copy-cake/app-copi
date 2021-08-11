<?php


namespace App\Core\Application\Command\TypeText\DeleteTypeText;


use App\Core\Infrastructure\Repository\TypeText\FindByOneTypeText;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

final class DeleteTypeTextCommandHandler implements EventSubscriberInterface
{
    /** @var EntityManagerInterface */
    private $entityManager;

    /** @var FindByOneTypeText */
    private $findByOneTypeText;

    public function __construct(
        EntityManagerInterface $entityManager,
        FindByOneTypeText $findByOneTypeText
    )
    {
        $this->entityManager = $entityManager;
        $this->findByOneTypeText = $findByOneTypeText;
    }

    public static function getSubscribedEvents()
    {
        return[
            DeleteTypeTextCommand::NAME => 'deleteText'
        ];
    }

    public function deleteText(DeleteTypeTextCommand $deleteTypeTextCommand): void
    {
        $typeText = $this->findByOneTypeText->findByOneText($deleteTypeTextCommand->getTypeText());

        $this->entityManager->remove($typeText);
        $this->entityManager->flush();
    }
}