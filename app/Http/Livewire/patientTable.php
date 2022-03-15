<?php

namespace App\Http\Livewire;
use App\Models\patient;
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

final class patientTable extends PowerGridComponent
{
    use ActionButton;

    //Messages informing success/error data is updated.
    public bool $showUpdateMessages = true;

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

    /**
    * PowerGrid datasource.
    *
    * @return  \Illuminate\Database\Eloquent\Builder<\App\Models\User>|null
    */
    public function datasource(): ?Builder
    {
        return patient::query();
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
        return [];
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
        // ->addColumn('actions', function (patient $model) 
        // {
            
        //     $edit_link=route('patient.edit',$model->id);
        //     $ban_link=route('patient.destroy',$model->id);
        //     return '<a class="btn text-white" style="background-color:#00C897;" href="'.$edit_link.'">Edit</a> 
        //             <a class="btn text-white" style="background-color:#E83A14;" href="'.$ban_link.'">Delete</a>'; 
        // })
       
            ->addColumn('id')
            ->addColumn('first_name')
            ->addColumn('last_name')
            ->addColumn('age')
            ->addColumn('phone')
            ->addColumn('address')
            ->addColumn('mr_number')
            ->addColumn('history',function(patient $model){
                $vital_link=route('vitals.create',$model->id);
                $vital_show_link=route('vitals.show',$model->id);
                return '
                <div class="btn-group">
                    <a class="dropdown-toggle btn savebtn text-white" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">History</a>
                    <div class="dropdown-menu " x-placement="bottom-start">
                        <a class="dropdown-item" href="'.$vital_link.'">Add History</a>
                            <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="'.$vital_show_link.'">Show History</a>
                    </div>
                </div>
                ';
    
            })
            ->addColumn('attachments',function(patient $model){
                   $file_link=route('attachment.display',$model->id);
                   return '<a class="btn btn-primary form-control " href="'.$file_link.'">Add</a>' ;
            })
            ->addColumn('created_at_formatted', function(patient $model) { 
                return Carbon::parse($model->created_at)->format('d/m/Y H:i:s');
            })
            ->addColumn('updated_at_formatted', function(patient $model) { 
                return Carbon::parse($model->updated_at)->format('d/m/Y H:i:s');
            });
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
                ->title('FIRST NAME')
                ->field('first_name')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title('LAST NAME')
                ->field('last_name')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title('AGE')
                ->field('age')
                ->makeInputRange(),

            Column::add()
                ->title('PHONE')
                ->field('phone')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title('ADDRESS')
                ->field('address')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title('MR NUMBER')
                ->field('mr_number')
                ->sortable()
                ->searchable()
                ->makeInputText(),

                Column::add()
                ->title('History')
                ->field('history'),

                Column::add()
                ->title('Attachments')
                ->field('attachments'),

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
     * PowerGrid patient Action Buttons.
     *
     * @return array<int, \PowerComponents\LivewirePowerGrid\Button>
     */

    
    public function actions(): array
    {
       return [

        Button::add('edit')
        ->caption('Edit')
        ->class('btn editbtn cursor-pointer text-white px-3 py-2.5 m-1 rounded text-sm')
        ->route('patient.edit', ['id' => 'id']),

        Button::add('destroy')
        ->caption('Delete')
        ->class('btn delbtn cursor-pointer text-white px-3 py-2 m-1 rounded text-sm')
        ->route('patient.destroy', ['id' => 'id'])
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
     * PowerGrid patient Action Rules.
     *
     * @return array<int, \PowerComponents\LivewirePowerGrid\Rules\RuleActions>
     */

    /*
    public function actionRules(): array
    {
       return [
           
           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($patient) => $patient->id === 1)
                ->hide(),
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
     * PowerGrid patient Update.
     *
     * @param array<string,string> $data
     */

    /*
    public function update(array $data ): bool
    {
       try {
           $updated = patient::query()->findOrFail($data['id'])
                ->update([
                    $data['field'] => $data['value'],
                ]);
       } catch (QueryException $exception) {
           $updated = false;
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
    */
}
