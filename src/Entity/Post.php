<?php

namespace App\Entity;

use DateTimeImmutable;
use App\Entity\Categorypost;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\PostRepository;
use Gedmo\Mapping\Annotation as Gedmo;
// use .../Contreints as Asset

/**
 * @ORM\Entity(repositoryClass=PostRepository::class)
 */
class Post
{
    public function __toString()
    {
        return $this->date;
    }

    //public function __construct(string $datetime = "now", ?DateTimeZone $timezone = null)
    
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @gedmo\Slug(fields={"title"})
     * @ORM\Column(type="string", length=255)
     * ---@asset ...
     */
    private $slug;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @ORM\Column(type="string", length=2000)
     */
    private $urlimage;

    /**
     * ---@Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime_immutable")
     */
    private $createdAt;

    /**
     * ---@Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime_immutable")
     */
    private $updateAt;

    /**
     * @ORM\Column(type="boolean")
     */
    private $highlighting;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="posts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=Categorypost::class, inversedBy="categoriesposts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $categorypost;

    /**
     * @ORM\Column(type="boolean")
     */
    private $active;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    // public function setSlug(string $slug): self
    // {
    //    $this->slug = $slug;
    //
    //    return $this;
    // }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getUrlimage(): ?string
    {
        return $this->urlimage;
    }

    public function setUrlimage(string $urlimage): self
    {
        $this->urlimage = $urlimage;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdateAt(): ?\DateTimeImmutable
    {
        return $this->updateAt;
    }

    public function setUpdateAt(\DateTimeImmutable $updateAt): self
    {
        $this->updateAt = $updateAt;

        return $this;
    }

    public function getHighlighting(): ?bool
    {
        return $this->highlighting;
    }

    public function setHighlighting(bool $highlighting): self
    {
        $this->highlighting = $highlighting;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getCategorypost(): ?Categorypost
    {
        return $this->categorypost;
    }

    public function setCategorypost(?Categorypost $categorypost): self
    {
        $this->categorypost = $categorypost;

        return $this;
    }

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;

        return $this;
    }
}
