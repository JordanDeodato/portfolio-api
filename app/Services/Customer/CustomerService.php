<?php 

namespace App\Services\Customer;

use App\Repositories\Customer\CustomerRepository;
use DateTime;

/**
 * Class CustomerService
 *
 * Service layer to handle business logic related to customers.
 */
class CustomerService
{
    /**
     * @var CustomerRepository
     */
    protected $customerRepository;

    /**
     * CustomerService constructor.
     *
     * @param CustomerRepository $customerRepository
     */
    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    /**
     * Retrieve all customers.
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getCustomers()
    {
        return $this->customerRepository->get();
    }

    /**
     * Retrieve a customer by their ID.
     *
     * @param int $id
     * @return \App\Models\Customer|null
     */
    public function getCustomerById($id)
    {
        return $this->customerRepository->getById($id);
    }

    /**
     * Create a new customer.
     *
     * @param \Illuminate\Http\Request $request
     * @return \App\Models\Customer
     */
    public function createCustomer($request)
    {
        $birthDate = \Carbon\Carbon::createFromFormat('d/m/Y', $request->birth)->format('Y-m-d');

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'birth' => $birthDate,
            'cpf' => $request->cpf
        ];

        return $this->customerRepository->create($data);
    }

    /**
     * Update an existing customer by their ID.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return bool
     */
    public function updateCustomer($request, $id)
    {
        $birthDate = \Carbon\Carbon::createFromFormat('d/m/Y', $request->birth)->format('Y-m-d');

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'birth' => $birthDate,
            'cpf' => $request->cpf
        ];

        return $this->customerRepository->update($data, $id);
    }

    /**
     * Delete a customer by their ID.
     *
     * @param int $id
     * @return bool
     */
    public function deleteCustomer($id)
    {
        return $this->customerRepository->delete($id);
    }
}
