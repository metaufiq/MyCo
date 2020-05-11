<?php
namespace Index\Modules\MyCo\Application\CreateManajer;

use Index\Modules\MyCo\Application\GenericResponse;
use Index\Modules\MyCo\Domain\Model\Manajer;
use Index\Modules\MyCo\Domain\Repository\ManajerRepository;

class CreateManajerService{
    protected $manajerRepository;


    public function __construct(
        ManajerRepository $manajerRepository)
    {
        $this->manajerRepository = $manajerRepository;
    }

    public function handle(CreateManajerRequest $request) : GenericResponse
    {
        try {
            $manajer = new Manajer($request->getNama(), $request->getEmail(), $request->getPassword());
            $response = $this->manajerRepository->save($manajer);
            
            return new GenericResponse($response, "Manajer created successfully.");
        } catch (\Exception $exception) {
            return new GenericResponse($exception, $exception->getMessage(), 500, true);
        }
    }
}