<?php 

namespace App\Repositories\Customer;

use App\Models\Customer;

/**
 * Class CustomerRepository
 * 
 * Repositório para interagir com o modelo de Customer.
 */
class CustomerRepository
{
    /**
     * @var Customer $model
     */
    protected $model;

    /**
     * CustomerRepository constructor.
     * 
     * @param Customer $model O modelo de cliente injetado.
     */
    public function __construct(Customer $model)
    {
        $this->model = $model;
    }

    /**
     * Retorna todos os registros dos clientes.
     * 
     */
    public function get()
    {
        return $this->model->active->get();
    }

    /**
     * Retorna todos os registros dos clientes.
     * 
     * @param int $id O id do cliente a ser editado.
     */
    public function getById($id)
    {
        return $this->model->find($id);
    }

    /**
     * Cria um novo registro de cliente.
     * 
     * @param array $data Os dados do cliente a serem criados.
     * @return Customer Retorna o modelo criado.
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * Atualiza um registro de cliente existente.
     * 
     * @param array $data Os novos dados do cliente.
     * @param int $id O ID do cliente a ser atualizado.
     * @return bool Retorna verdadeiro se a atualização for bem-sucedida.
     */
    public function update(array $data, int $id)
    {
        return $this->model->find($id)->update($data);
    }

    /**
     * Exclui um registro de cliente.
     * 
     * @param int $id O ID do cliente a ser excluído.
     * @return bool Retorna verdadeiro se a exclusão for bem-sucedida.
     */
    public function delete(int $id)
    {
        return $this->model->find($id)->delete();
    }
}
