<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                
                    <div class="flex justify-content " > 
                        <h3>Employee Details </h3>
                        
                        <button type="button" class="ml-auto p-2" > 
                            <a href="/insert">
                                <span class="material-icons">add_task </span>
                            </a>
                        </button>
                    </div>
                    
                         @include('employees.emp_list') 
                    </div>  
                    
                    

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
