<?php

namespace App\Http\Livewire\Manage\Tables;

use App\Models\DrinkingEvent;
use App\Models\DrinkingLocation;
use Illuminate\Support\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridEloquent;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\Rules\Rule;
use App\Models\User;

final class DrinkingEventsTable extends PowerGridComponent
{
    use ActionButton;

    //Messages informing success/error data is updated.
    public bool $showUpdateMessages = true;

    protected function getListeners() : array
    {
        return array_merge(
            parent::getListeners(),
            [
                'createdDrinkingEvent' => '$refresh',
                'changedAtHome' => '$refresh'
            ]);

    }
    /*
    |--------------------------------------------------------------------------
    |  Features Setup
    |--------------------------------------------------------------------------
    | Setup Table's general features
    |
    */
    public function setUp(): void
    {
        $this->showCheckBox()
            ->showPerPage()
            ->showSearchInput()
            ->showExportOption('download', ['excel', 'csv']);
    }

    /*
    |--------------------------------------------------------------------------
    |  Datasource
    |--------------------------------------------------------------------------
    | Provides data to your Table using a Model or Collection
    |
    */
    public function datasource(): ?Builder
    {
        return DrinkingEvent::query()->with(['drinkingLocation','supplier']);
    }

    /*
    |--------------------------------------------------------------------------
    |  Relationship Search
    |--------------------------------------------------------------------------
    | Configure here relationships to be used by the Search and Table Filters.
    |
    */

    /**
     * Relationship search.
     *
     * @return array<string, array<int, string>>
     */
    public function relationSearch(): array
    {
        return [
            'drinkingLocation' => [
                'address_first_line',
                'address_postcode'
            ],
            'supplier' => [
                'reference',
            ],
            'user' => [
                'user_id',
                'name'
            ]
        ];
    }

    /*
    |--------------------------------------------------------------------------
    |  Add Column
    |--------------------------------------------------------------------------
    | Make Datasource fields available to be used as columns.
    | You can pass a closure to transform/modify the data.
    |
    */
    public function addColumns(): ?PowerGridEloquent
    {
        return PowerGrid::eloquent()
            ->addColumn('id')
            ->addColumn('event_date_time_formatted', function(DrinkingEvent $model) {
                return Carbon::parse($model->event_date_time)->format('d/m/Y H:i:s');
            })
            ->addColumn('user_id', function (DrinkingEvent $model) {
                return $model->user()->first()->name;
            })
            ->addColumn('rating')
            ->addColumn('drinking_location_id', function (DrinkingEvent $model) {
                error_log($model->atHomeOrLocation());
                return $model->atHomeOrLocation();

            })
            ->addColumn('comments')
            ->addColumn('drank_at_home', function (DrinkingEvent $model) {
                return $model->atHomeOrLocation() === 'At home';
            })
            ->addColumn('coffee_type_id', function (DrinkingEvent $model) {
                return $model->coffeeType()->first()->description;
            })
            ->addColumn('supplier_id', function (DrinkingEvent $model) {
                return $model->supplier()->first()->reference;
            })
            ->addColumn('brand_id', function (DrinkingEvent $model) {
                return $model->brand()->first()->name;
            })
            ->addColumn('created_at_formatted', function(DrinkingEvent $model) {
                return Carbon::parse($model->created_at)->format('d/m/Y H:i:s');
            });
        /*
            ->addColumn('updated_at_formatted', function(DrinkingEvent $model) {
                return Carbon::parse($model->updated_at)->format('d/m/Y H:i:s');
            });*/
    }

    /*
    |--------------------------------------------------------------------------
    |  Include Columns
    |--------------------------------------------------------------------------
    | Include the columns added columns, making them visible on the Table.
    | Each column can be configured with properties, filters, actions...
    |
    */

     /**
     * PowerGrid Columns.
     *
     * @return array<int, Column>
     */
    public function columns(): array
    {
        return [
            Column::add()
                ->title('ID')
                ->field('id')
                ->makeInputRange(),

            Column::add()
                ->title('USER')
                ->field('user_id')
                ->makeInputSelect(User::all(),'name','user_id'),
            Column::add()
                ->title('EVENT DATE TIME')
                ->field('event_date_time_formatted', 'event_date_time')
                ->searchable()
                ->sortable()
                ->makeInputDatePicker('event_date_time')
                ->editOnClick(),

            Column::add()
                ->title('LOCATION')
                ->field('drinking_location_id')
                ->searchable()
                ->sortable()
                ->makeInputSelect(DrinkingLocation::all(),'address_first_line','drinking_location_id')
                ,

            Column::add()
                ->title('RATING')
                ->field('rating')
                ->makeInputRange()
            ->editOnClick(),

            Column::add()
                ->title('COMMENTS')
                ->field('comments')
                ->sortable()
                ->searchable()
                ->makeInputText()
            ->editOnClick(),

            Column::add()
                ->title('DRANK AT HOME')
                ->field('drank_at_home')
                ->toggleable()
            ,

            Column::add()
                ->title('COFFEE TYPE ID')
                ->field('coffee_type_id')
                ->makeInputRange()
            ->editOnClick(),

            Column::add()
                ->title('SUPPLIER ID')
                ->field('supplier_id')
                ->makeInputRange()
            ->editOnClick(),

            Column::add()
                ->title('BRAND ID')
                ->field('brand_id')
                ->makeInputRange()
            ->editOnClick(),

            Column::add()
                ->title('CREATED AT')
                ->field('created_at_formatted', 'created_at')
                ->searchable()
                ->sortable()
                ->makeInputDatePicker('created_at'),
/*
            Column::add()
                ->title('UPDATED AT')
                ->field('updated_at_formatted', 'updated_at')
                ->searchable()
                ->sortable()
                ->makeInputDatePicker('updated_at'),
*/
        ]
;
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Method
    |--------------------------------------------------------------------------
    | Enable the method below only if the Routes below are defined in your app.
    |
    */

     /**
     * PowerGrid DrinkingEvent Action Buttons.
     *
     * @return array<int, \PowerComponents\LivewirePowerGrid\Button>
     */


    public function actions(): array
    {
       return [
           /*
           Button::add('edit')
               ->caption('Edit')
               ->class('bg-indigo-500 cursor-pointer text-white px-3 py-2.5 m-1 rounded text-sm')
               ->route('drinking-event.edit', ['drinking-event' => 'id']),
            */
           Button::add('destroy')
               ->caption('Delete')
               ->class('bg-red-500 cursor-pointer text-black px-3 py-2 m-1 rounded text-sm')
               ->route('drinkingEvents.delete', ['id' => 'id'])
               ->method('delete')
        ];
    }


    /*
    |--------------------------------------------------------------------------
    | Actions Rules
    |--------------------------------------------------------------------------
    | Enable the method below to configure Rules for your Table and Action Buttons.
    |
    */

     /**
     * PowerGrid DrinkingEvent Action Rules.
     *
     * @return array<int, \PowerComponents\LivewirePowerGrid\Rules\Rule>
     */

/*
    public function actionRules(): array
    {
       return [


        ];
    }
*/

    /*
    |--------------------------------------------------------------------------
    | Edit Method
    |--------------------------------------------------------------------------
    | Enable the method below to use editOnClick() or toggleable() methods.
    | Data must be validated and treated (see "Update Data" in PowerGrid doc).
    |
    */

     /**
     * PowerGrid DrinkingEvent Update.
     *
     * @param array<string,string> $data
     */


    public function update(array $data ): bool
    {
       try {
           $updated = DrinkingEvent::query()->findOrFail($data['id'])
                ->update([
                    $data['field'] => $data['value'],
                ]);
       } catch (QueryException $exception) {
           $updated = false;
           error_log($exception->getMessage());
       }
       if ($updated)
       {
           error_log('updated');
           //$this->fillData();
           //$this->emit('changedAtHome');
       }
       return $updated;
    }

    public function updateMessages(string $status = 'error', string $field = '_default_message'): string
    {
        $updateMessages = [
            'success'   => [
                '_default_message' => __('Data has been updated successfully!'),
                //'custom_field'   => __('Custom Field updated successfully!'),
            ],
            'error' => [
                '_default_message' => __('Error updating the data.'),
                //'custom_field'   => __('Error updating custom field.'),
            ]
        ];

        $message = ($updateMessages[$status][$field] ?? $updateMessages[$status]['_default_message']);

        return (is_string($message)) ? $message : 'Error!';
    }

}
