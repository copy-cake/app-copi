<?php


namespace App\Core\Application\Query\TypeText\GetTypeText;


use App\Core\Application\Query\TypeText\TypeTextDTO;
use App\Core\Infrastructure\Repository\TypeText\FindByTypeText;
use App\Shared\Infrastructure\ValueObject\PaginatedData;

final class TypeTextQueryHandler
{
    /** @var FindByTypeText */
    private $findByTypeText;

    public function __construct(
        FindByTypeText $findByTypeText
    )
    {
        $this->findByTypeText = $findByTypeText;
    }

    public function __invoke(TypeTextQuery $textQuery): array
    {
        $typeTexts = $this->findByTypeText->findByText($textQuery->getUser());

        $buildTable = [];
        foreach ($typeTexts as $typeText) {

            $buildTable[] = TypeTextDTO::fromEntity($typeText);
        }

        return $buildTable;
    }
}