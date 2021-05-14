
<br>
<div class="container centered">
    <a class="btn btn-dark btn-lg shadow rounded"  href="#" tabindex="-1"  data-bs-toggle="modal" data-bs-target="#addq" >Добавить цитату</a></div>


<!-- Modal -->
<div class="modal fade" id="addq" tabindex="-1" aria-labelledby="modlb" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modlb">Add Quote<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-brightness-low" viewBox="0 0 16 16">
                        <path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm.5-9.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 11a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm5-5a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm-11 0a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm9.743-4.036a.5.5 0 1 1-.707-.707.5.5 0 0 1 .707.707zm-7.779 7.779a.5.5 0 1 1-.707-.707.5.5 0 0 1 .707.707zm7.072 0a.5.5 0 1 1 .707-.707.5.5 0 0 1-.707.707zM3.757 4.464a.5.5 0 1 1 .707-.707.5.5 0 0 1-.707.707z"/>
                    </svg></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="checks/check_quo.php">
                    <div class="mb-3">
                        <label for="quot" class="form-label">Текст цитаты</label>
                        <textarea class="form-control" id="quot" name="quot" rows="7"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="authorq" class="form-label">Автор цитаты</label>
                        <input class="form-control" id="authorq" name="authorq" placeholder="Имя">
                    </div>

            </div>
            <div class="modal-footer">
                <?php
                if($_COOKIE['user'] != ''):?>
                    <button type="submit" class="btn btn-outline-dark">Send</button>
                <?php endif; ?>
                <?php
                if($_COOKIE['user'] == ''):?>
                    <p class="text-danger">Необходимо Авторизироваться!</p>
                    <button type="submit" class="btn btn-outline-info btn-lg disabled" >Send</button>
                <?php endif; ?>



            </div>
            </form>

            </form>
        </div>
    </div>
</div>