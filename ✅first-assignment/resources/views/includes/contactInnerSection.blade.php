<section>
    <h2>Form</h2>
    <form method="post" action="#">
        <div class="row gtr-uniform">
            <div class="col-6 col-12-xsmall">
                <input type="text" name="name" id="name" value="" placeholder="Name" />
            </div>
            <div class="col-6 col-12-xsmall">
                <input type="email" name="email" id="email" value="" placeholder="Email" />
            </div>
            <div class="col-12">
                <select name="category" id="category">
                        <option value="">- Category -</option>
                        <option value="1">Manufacturing</option>
                        <option value="1">Shipping</option>
                        <option value="1">Administration</option>
                        <option value="1">Human Resources</option>
                    </select>
            </div>
            <div class="col-4 col-12-small">
                <input type="radio" id="priority-low" name="priority" checked>
                <label for="priority-low">Low</label>
            </div>
            <div class="col-4 col-12-small">
                <input type="radio" id="priority-normal" name="priority">
                <label for="priority-normal">Normal</label>
            </div>
            <div class="col-4 col-12-small">
                <input type="radio" id="priority-high" name="priority">
                <label for="priority-high">High</label>
            </div>
            <div class="col-6 col-12-small">
                <input type="checkbox" id="copy" name="copy">
                <label for="copy">Email me a copy</label>
            </div>
            <div class="col-6 col-12-small">
                <input type="checkbox" id="human" name="human">
                <label for="human">Not a robot</label>
            </div>
            <div class="col-12">
                <textarea name="message" id="message" placeholder="Enter your message" rows="6"></textarea>
            </div>
            <div class="col-12">
                <ul class="actions">
                    <li><input type="submit" value="Send Message" class="primary" /></li>
                    <li><input type="reset" value="Reset" /></li>
                </ul>
            </div>
        </div>
    </form>
</section>