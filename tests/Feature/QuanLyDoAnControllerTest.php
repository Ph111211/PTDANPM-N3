<?php
use Tests\TestCase;
use App\Models\User;
class QuanLyDoAnControllerTest extends TestCase
{
public function test_index_returns_correct_view_and_data()
{
    $user = User::factory()->create();
        $this->actingAs($user);

    $response = $this->get('/giangvien/quanlydoan');

    $response->assertStatus(200);
    $response->assertViewIs('giangvien.quanlydoan.index');
    $response->assertViewHasAll(['doans', 'logo', 'sinhviens']);
}
}