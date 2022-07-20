<?php

namespace App\Http\Controllers;

use Exception;
use HomeAppliance\Domain\HomeAppliance\Exceptions\InvalidBrandException;
use HomeAppliance\Domain\HomeAppliance\Exceptions\InvalidVoltageException;
use HomeAppliance\Domain\HomeAppliance\UseCases\Create\Create;
use HomeAppliance\Domain\HomeAppliance\UseCases\Create\DTO as CreateDTO;
use HomeAppliance\Domain\HomeAppliance\UseCases\Delete\Delete;
use HomeAppliance\Domain\HomeAppliance\UseCases\Delete\DTO as DeleteDTO;
use HomeAppliance\Domain\HomeAppliance\UseCases\GetHomeAppliance\DTO as GetHomeApplianceDTO;
use HomeAppliance\Domain\HomeAppliance\UseCases\GetHomeAppliance\HomeAppliance as GetHomeAppliance;
use HomeAppliance\Domain\HomeAppliance\UseCases\GetHomeAppliances\HomeAppliances;
use HomeAppliance\Domain\HomeAppliance\UseCases\Update\DTO as UpdateDTO;
use HomeAppliance\Domain\HomeAppliance\UseCases\Update\Update;
use HomeAppliance\Infra\HomeAppliance\Repositories\HomeAppliance as RepositoriesHomeAppliance;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Validator;

class HomeAppliance extends Controller
{
    public function index(): JsonResponse
    {
        $useCase = new HomeAppliances(new RepositoriesHomeAppliance());
        try {
            $homeAppliances = $useCase->execute();
        } catch (Exception $e) {
            return response()->json([], 500);
        }

        return response()->json($homeAppliances->response());
    }

    public function show(int $id): JsonResponse
    {
        $DTO = new GetHomeApplianceDTO($id);

        $useCase = new GetHomeAppliance(new RepositoriesHomeAppliance());

        try {
            $homeAppliance = $useCase->execute($DTO);
        } catch (ModelNotFoundException $e) {
            return response()->json([], 404);
        } catch (Exception $e) {
            return response()->json([], 500);
        }
        return response()->json($homeAppliance->response());
    }

    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
                'name' => 'required',
                'description' => 'required',
                'voltage' => 'required',
                'brand' => 'required',
            ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $DTO = new CreateDTO(
            $request->name,
            $request->description,
            $request->voltage,
            $request->brand
        );

        $useCase = new Create(new RepositoriesHomeAppliance());

        try {
            $homeAppliance = $useCase->execute($DTO);
        } catch (InvalidVoltageException $e) {
            return response()->json([$e->getMessage()], 400);
        } catch (InvalidBrandException $e) {
            return response()->json([$e->getMessage()], 400);
        } catch (Exception $e) {
            return response()->json([], 500);
        }
        return response()->json($homeAppliance);
    }

    public function update(int $id, Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'voltage' => 'required',
            'brand' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $DTO = new UpdateDTO(
            $id,
            $request->name,
            $request->description,
            $request->voltage,
            $request->brand
        );

        $useCase = new Update(new RepositoriesHomeAppliance());

        try {
            $homeAppliance = $useCase->execute($DTO);
        } catch (ModelNotFoundException $e) {
            return response()->json([], 404);
        } catch (InvalidVoltageException $e) {
            return response()->json([$e->getMessage()], 400);
        } catch (InvalidBrandException $e) {
            return response()->json([$e->getMessage()], 400);
        } catch (Exception $e) {
            return response()->json([$e->getMessage()], 500);
        }

        return response()->json($homeAppliance->response());
    }

    public function destroy(int $id): JsonResponse
    {
        $DTO = new DeleteDTO($id);

        $useCase = new Delete(new RepositoriesHomeAppliance());

        try {
            $useCase->execute($DTO);
        } catch (ModelNotFoundException $e) {
            return response()->json([], 404);
        } catch (Exception $e) {
            return response()->json([], 500);
        }

        return response()->json([], 201);
    }
}
