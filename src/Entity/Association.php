<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AssociationRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Form\Extension\Core\Type\EnumType;

#[ORM\Entity(repositoryClass: AssociationRepository::class)]
#[ORM\Table(name: 't_assoc')]
#[ApiResource]
class Association
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id_assoc', type: 'integer')]
    private $id;

    #[ORM\Column(name: 'vendeur', type: 'string', columnDefinition:"enum('O', 'N', 'V')")]
    #[Assert\NotNull]
    private $vendeur;

    #[ORM\Column(name: 'id_detail', type: 'integer')]
    private $id_detail;

    #[ORM\Column(name: 'id_detail_stock', type: 'integer')]
    private $id_detail_stock;

    #[ORM\Column(name: 'quantite', type: 'integer', nullable: false)]
    #[Assert\Positive]
    private $quantite;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getValeur(): ?EnumType
    {
        return $this->vendeur;
    }

    public function setValeur(string $vendeur): self
    {
        $this->enum = $vendeur;

        return $this;
    }

    public function getIdDetail(): ?int
    {
        return $this->id_detail;
    }

    public function setIdDetail(int $id_detail): self
    {
        $this->id_detail = $id_detail;

        return $this;
    }

    public function getIdDetailStock(): ?int
    {
        return $this->id_detail_stock;
    }

    public function setIdDetailStock(int $id_detail_stock): self
    {
        $this->id_detail_stock = $id_detail_stock;

        return $this;
    }

    public function getQuantité(): ?int
    {
        return $this->quantite;
    }

    public function setQuantité(?int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }
}
