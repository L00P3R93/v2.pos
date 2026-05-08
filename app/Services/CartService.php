<?php

namespace App\Services;

use App\Models\SavedCart;
use Illuminate\Support\Str;

class CartService
{
    private const ACTIVE_KEY = 'pos.active_cart';

    private const CARTS_KEY = 'pos.carts';

    private string $cartId;

    public function __construct()
    {
        $this->cartId = session(self::ACTIVE_KEY) ?? $this->boot();
    }

    public function getCartId(): string
    {
        return $this->cartId;
    }

    /**
     * @return array<int, array{id:int, name:string, price:float, qty:int}>
     */
    public function getItems(): array
    {
        return session(self::CARTS_KEY.'.'.$this->cartId.'.items', []);
    }

    public function add(int $productId, string $name, float $price, int $qty = 1): void
    {
        $items = $this->getItems();

        if (isset($items[$productId])) {
            $items[$productId]['qty'] += $qty;
        } else {
            $items[$productId] = [
                'id' => $productId,
                'name' => $name,
                'price' => $price,
                'qty' => $qty,
            ];
        }

        $this->writeItems($items);
    }

    public function remove(int $productId): void
    {
        $items = $this->getItems();
        unset($items[$productId]);
        $this->writeItems($items);
    }

    public function update(int $productId, int $qty): void
    {
        if ($qty <= 0) {
            $this->remove($productId);

            return;
        }

        $items = $this->getItems();

        if (isset($items[$productId])) {
            $items[$productId]['qty'] = $qty;
            $this->writeItems($items);
        }
    }

    public function getCustomerId(): ?int
    {
        return session(self::CARTS_KEY.'.'.$this->cartId.'.customer_id');
    }

    public function setCustomerId(?int $customerId): void
    {
        session([self::CARTS_KEY.'.'.$this->cartId.'.customer_id' => $customerId]);
    }

    public function clear(): void
    {
        session()->forget(self::CARTS_KEY.'.'.$this->cartId);
    }

    public function getTotal(): float
    {
        return (float) collect($this->getItems())->sum(fn ($i) => $i['price'] * $i['qty']);
    }

    public function getCount(): int
    {
        return (int) collect($this->getItems())->sum('qty');
    }

    /**
     * Persist the current cart to the saved_carts table and return the record.
     */
    public function save(int $userId, string $name, ?int $customerId = null): SavedCart
    {
        return SavedCart::query()->create([
            'uuid' => (string) Str::uuid(),
            'user_id' => $userId,
            'customer_id' => $customerId,
            'name' => $name,
            'items' => array_values($this->getItems()),
        ]);
    }

    /**
     * Replace the active cart with items from a saved cart.
     */
    public function restore(array $items, ?int $customerId = null): void
    {
        $indexed = [];

        foreach ($items as $item) {
            $id = (int) $item['id'];
            $indexed[$id] = [
                'id' => $id,
                'name' => $item['name'],
                'price' => (float) $item['price'],
                'qty' => (int) $item['qty'],
            ];
        }

        $this->writeItems($indexed);
        $this->setCustomerId($customerId);
    }

    private function boot(): string
    {
        $id = (string) Str::uuid();
        session([self::ACTIVE_KEY => $id]);

        return $id;
    }

    private function writeItems(array $items): void
    {
        session([self::CARTS_KEY.'.'.$this->cartId.'.items' => $items]);
    }
}
