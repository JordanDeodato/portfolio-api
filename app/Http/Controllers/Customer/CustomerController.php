<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\CustomerRequest;
use App\Services\Customer\CustomerService;
use Exception;
use Illuminate\Http\JsonResponse;

/**
 * Class CustomerController
 * 
 * Controller responsável pelo gerenciamento dos clientes. 
 * Ele utiliza o CustomerService para interagir com a camada de serviço.
 * 
 * @package App\Http\Controllers\Customer
 */
class CustomerController extends Controller
{
    /**
     * @var CustomerService
     */
    protected $customerService;

    /**
     * CustomerController constructor.
     *
     * @param CustomerService $customerService
     */
    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    /**
     * Retorna uma lista de todos os clientes.
     *
     * @return JsonResponse
     */
    public function getCustomers(): JsonResponse
    {
        try {
            $customers = $this->customerService->getCustomers();

            return response()->json([
                "customers" => $customers,
                "message" => "Customers listed successfully.",
                "success" => true
            ], 200);

        } catch(Exception $e) {
            return response()->json([
                "message" => $e->getMessage(),
                "success" => false
            ], 400);
        }
    }

    /**
     * Retorna os detalhes de um cliente específico pelo ID.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function getCustomerById($id): JsonResponse
    {
        try {
            $customer = $this->customerService->getCustomerById($id);

            return response()->json([
                "customer" => $customer,
                "message" => "Customer listed successfully.",
                "success" => true
            ], 200);

        } catch(Exception $e) {
            return response()->json([
                "message" => $e->getMessage(),
                "success" => false
            ], 400);
        }
    }

    /**
     * Cria um novo cliente com base nos dados fornecidos.
     *
     * @param CustomerRequest $request
     * @return JsonResponse
     */
    public function createCustomer(CustomerRequest $request): JsonResponse
    {
        try {
            $this->customerService->createCustomer($request);

            return response()->json([
                "message" => "Customer created successfully.",
                "success" => true
            ], 201);

        } catch(Exception $e) {
            return response()->json([
                "message" => $e->getMessage(),
                "success" => false
            ], 400);
        }
    }

    /**
     * Atualiza os dados de um cliente específico pelo ID.
     *
     * @param CustomerRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function updateCustomer(CustomerRequest $request, $id): JsonResponse
    {
        try {
            $this->customerService->updateCustomer($request, $id);

            return response()->json([
                "message" => "Customer updated successfully.",
                "success" => true
            ], 200);

        } catch(Exception $e) {
            return response()->json([
                "message" => $e->getMessage(),
                "success" => false
            ], 400);
        }
    }

    /**
     * Exclui um cliente específico pelo ID.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function deleteCustomer($id): JsonResponse
    {
        try {
            $this->customerService->deleteCustomer($id);

            return response()->json([
                "message" => "Customer deleted successfully.",
                "success" => true
            ], 200);

        } catch(Exception $e) {
            return response()->json([
                "message" => $e->getMessage(),
                "success" => false
            ], 400);
        }
    }
}
