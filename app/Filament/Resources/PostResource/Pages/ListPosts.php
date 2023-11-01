<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use Closure;
use Filament\Actions;
use Filament\Facades\Filament;
use Filament\Resources\Pages\ListRecords;

class ListPosts extends ListRecords
{
    protected static string $resource = PostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\Action::make('Generate')
                ->action(function () {
                    // Figure out what resources exist
                    $resources = Filament::getResources();
                    dump($resources);

                    // For each resource, generate a policy
                    foreach ($resources as $resource) {
                        // $resourceName = $resource::uriKey();
                        dump("Generating policy for {$resource} -> {$resource::getModel()}...");
                        // dump($resource::getModel());
                        // Generate policy code here
                    }
                }),
        ];
    }
}
