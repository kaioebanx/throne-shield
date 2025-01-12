<?php

namespace App\ChallengeGroup\Http\Requests;

use App\ChallengeGroup\DTO\ChallengeGroupDTO;
use App\ChallengeGroup\DTO\CreateChallengeGroupDTO;
use App\Shared\Http\Requests\ConvertsToDTO;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $name
 * @property string $end_date
 */
class CreateChallengeGroupRequest extends FormRequest implements ConvertsToDTO
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:80'],
            'end_date' => ['required', 'date', 'after:today'],
        ];
    }

    public function toDTO(): CreateChallengeGroupDTO
    {
        return new CreateChallengeGroupDTO(
            name: $this->name,
            end_date: $this->end_date,
        );
    }
}
