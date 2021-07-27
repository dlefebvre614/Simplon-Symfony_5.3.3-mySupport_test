<?php

namespace App\Entity;

use App\Repository\CategorypostRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategorypostRepository::class)
 */
class Categorypost
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=120)
     */
    private $slug;

    /**
     * @ORM\ManyToOne(targetEntity=Categorypost::class, inversedBy="categoryposts")
     */
    private $parentpost;

    /**
     * @ORM\OneToMany(targetEntity=Categorypost::class, mappedBy="parentpost")
     */
    private $categoryposts;

    /**
     * @ORM\OneToMany(targetEntity=Post::class, mappedBy="categorypost")
     */
    private $categoriesposts;

    public function __construct()
    {
        $this->categoryposts = new ArrayCollection();
        $this->categoriesposts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getParentpost(): ?self
    {
        return $this->parentpost;
    }

    public function setParentpost(?self $parentpost): self
    {
        $this->parentpost = $parentpost;

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getCategoryposts(): Collection
    {
        return $this->categoryposts;
    }

    public function addCategorypost(self $categorypost): self
    {
        if (!$this->categoryposts->contains($categorypost)) {
            $this->categoryposts[] = $categorypost;
            $categorypost->setParentpost($this);
        }

        return $this;
    }

    public function removeCategorypost(self $categorypost): self
    {
        if ($this->categoryposts->removeElement($categorypost)) {
            // set the owning side to null (unless already changed)
            if ($categorypost->getParentpost() === $this) {
                $categorypost->setParentpost(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Post[]
     */
    public function getCategoriesposts(): Collection
    {
        return $this->categoriesposts;
    }

    public function addCategoriespost(Post $categoriespost): self
    {
        if (!$this->categoriesposts->contains($categoriespost)) {
            $this->categoriesposts[] = $categoriespost;
            $categoriespost->setCategorypost($this);
        }

        return $this;
    }

    public function removeCategoriespost(Post $categoriespost): self
    {
        if ($this->categoriesposts->removeElement($categoriespost)) {
            // set the owning side to null (unless already changed)
            if ($categoriespost->getCategorypost() === $this) {
                $categoriespost->setCategorypost(null);
            }
        }

        return $this;
    }
}
