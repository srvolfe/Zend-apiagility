<?php
namespace PetsAPI\V1\Rest\Pets;

class PetsResourceFactory
{
    public function __invoke($services)
    {
        return new PetsResource($services->get('PetService'));
    }
}
