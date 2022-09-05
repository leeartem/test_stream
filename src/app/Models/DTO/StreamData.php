<?php
namespace App\Models\DTO;

use Carbon\Carbon;
use App\Models\Stream;
use App\Models\User;
use Illuminate\Http\Request;
use App\Parents\ObjectData;
 
final class StreamData extends ObjectData
{
    public ?string $id;
    public string $title;
    public string $description;
    public ?string $status;
    public ?string $api_name;
    public $preview;
    public int $user_id;
    public ?string $user_nickname;

    public static function fromRequest(Request $request): StreamData
    {
        return new StreamData(
            title: $request->get('title'),
            description: $request->get('description'),
            preview: $request->preview,
            api_name: $request->get('api_name'),
            user_id: auth()->id(),
        );
    }

    public static function fromModel(Stream $stream): self
    {
        $user = User::find($stream->user_id, ['nickname']);
        return new static([
            'id' => $stream->id,
            'title' => $stream->title,
            'description' => $stream->description,
            'preview' => $stream->preview,
            'user_id' => $stream->user_id,
            'api_name' => $stream->api_name,
            'status' => $stream->status,
            'user_nickname' => $user->nickname, 
        ]);

    }

 

}
    